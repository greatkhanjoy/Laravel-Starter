<x-admin-layout>
    <div class="container">
        <div class="w-96 shadow-md p-4 mx-auto">
            <a href="{{route('admin.role.index')}}" class="bg-white text-black border rounded-md px-4 py-2 flex items-center gap-1 w-24 text-center justify-center"><ion-icon name="arrow-back"></ion-icon>Back</a>
            <h3 class="text-center">Edit role</h3>
            <form action="{{route('admin.role.update', $role->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-6">
                <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                <input type="text" id="role" name="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{old('role', $role->name)}}" required>
                @error('role')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
                </div>
                <div class="mb-6">
                <label for="permissions" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Assign Permissions</label>
                <select name="permissions[]" id="permissions" multiple class="w-full">
                    @foreach ($permissions as $permission )
                    <option @if($role->permissions->contains('id', $permission->id)) selected @endif value="{{$permission->id}}">{{$permission->name}}</option>
                    @endforeach
                </select>
                @error('permissions')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
                </div>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </form>
        </div>

    </div>
</x-admin-layout>