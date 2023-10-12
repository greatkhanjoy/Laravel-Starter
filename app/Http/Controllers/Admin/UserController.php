<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\ImageUploadTrait;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (auth()->user()->hasRole('super-admin')) {
            $users = User::all();
        } else {
            $users = User::with('roles')
                ->whereHas('roles', function ($query) {
                    $query->whereNotIn('name', ['super-admin']);
                })
                ->get();
        }

        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->hasRole('super-admin')) {
            $roles = Role::all();
        }else{
            $roles = Role::whereNotIn('name', ['super-admin'])->get();
        }
        
        $permissions = Permission::all();
        return view('admin.user.create', compact('roles', 'permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'roles' => ['array', 'required'],
            'permissions' => ['array'],
            'image' => ['required', 'image']
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'image' => $this->uploadImage($request, 'image', 'uploads')
        ])->assignRole($request->roles)->syncPermissions($request->permissions);

        


        

        return redirect()->route('admin.user.index')->with('success', 'User Added Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {   
        $roles = Role::all();
        $permissions = Permission::all();
        return view('admin.user.edit', compact('user', 'roles', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'roles' => ['array', 'required'],
            'permissions' => ['array'],
            'image' => ['nullable', 'image']
        ]);

        $user->update([
            'name'  => $request->name,
            'email' => $request->email,
            'image' => $this->updateImage($request, 'image', 'uploads', $user->image)
        ]);

        $user->syncRoles($request->roles)->syncPermissions($request->permissions);

        return redirect()->route('admin.user.index')->with('success', 'Updated Successfully.');

        
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {   
        if(File::exists(public_path($user->image))){
            File::delete(public_path($user->image));
        }

        $user->delete();
        return redirect()->back()->with('success', 'Deleted Successfully.');
    }
}
