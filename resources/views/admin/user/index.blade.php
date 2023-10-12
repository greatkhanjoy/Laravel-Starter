<x-admin-layout>
  
    <div class="container">
        <div class="w-full flex justify-between items-center mb-2">
            <h2>Users</h2>
            <a href="{{route('admin.user.create')}}" class="px-3 py-2 bg-green-500 text-white flex items-center gap-2"><ion-icon name="add-circle-outline"></ion-icon> <span>Add new user</span></a>
        </div>
        <div class="w-full relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Roles
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Permissions
                        </th>
                        <th scope="col" class="px-6 py-3 text-end">
                            Action
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user )
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="capitalize  px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$user->name}}
                        </th>
                        <th scope="row" class=" px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$user->email}}
                        </th>
                        <td class="px-6 py-4">
                            @foreach ($user->roles as $role )
                            <span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300">{{$role->name}}</span>
                            @endforeach
                        </td>
                        <td class="px-6 py-4">

                            @foreach ($user->getDirectPermissions() as $permission )
                            <span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300">{{$permission->name}}</span>
                            @endforeach
                        </td>
                        <td class="px-6 py-4 text-right flex gap-1 justify-end">
                            <a href="{{route('admin.user.edit', $user->id)}}" class="bg-blue-500 text-white text-lg px-2 py-1 leading-none hover:bg-blue-600" ><ion-icon name="create-outline"></ion-icon></a>
                            <form action="{{route('admin.user.destroy', $user->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white text-lg px-2 py-1 leading-none hover:bg-red-600" ><ion-icon name="trash-outline"></ion-icon></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

</x-admin-layout>