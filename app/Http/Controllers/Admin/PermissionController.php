<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::all();
        return view('admin.permission.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'permission' => ['required','string']
        ]);

        Permission::create([
            'name' => $request->permission
        ]);

        return redirect()->route('admin.permission.index')->with('success', 'Permission Addedd Successfully.');
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
    public function edit(Permission $permission)
    {   
        $roles = Role::all();
        return view('admin.permission.edit', compact('permission', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'permission' => ['required', 'string'],
            'roles'   => ['array']
        ]);

        $permission->update([
            'name'  => $request->permission
        ]);

        $permission->syncRoles($request->roles);

        return redirect()->back()->with('success', 'Changes Saved.');

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();

        return redirect()->back()->with('success', 'Deleted Successfully.');
    }
}
