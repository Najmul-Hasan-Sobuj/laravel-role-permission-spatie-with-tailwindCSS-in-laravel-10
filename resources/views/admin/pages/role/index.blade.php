<x-admin-layout>
    <x-slot name="header">
        <div class="grid grid-cols-2">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Role') }}
            </h2>
            <a href="{{ route('admin.roles.create') }}"
                class="px-4 py-2 text-sm text-white bg-green-600 rounded hover:bg-blue-600 text-center">Create
                Role</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-white uppercase bg-gray-600 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">Name</th>
                            <th scope="col" class="px-6 py-3">Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($roles as $role)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $role->name }}
                                </th>
                                <td class="px-6 py-4">
                                    <a href="{{ route('admin.roles.edit', $role->id) }}"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                    <a href="{{ route('admin.roles.give-permission', $role->id) }}"
                                        class="font-medium text-lime-600 dark:text-lime-600 hover:underline">Assign
                                        Permissions</a>
                                    <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded grid"
                                role="alert">
                                <strong class="font-bold text-center">No Record Found</strong>
                            </div>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-admin-layout>
