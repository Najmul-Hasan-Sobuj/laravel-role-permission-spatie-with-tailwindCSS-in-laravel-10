<x-admin-layout>
    <x-slot name="header">
        <div class="grid grid-cols-2">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Assign Permission to the Role') }}
            </h2>
            <a href="{{ url()->previous() }}"
                class="px-4 py-2 text-sm text-white bg-green-600 rounded hover:bg-blue-600 text-center">
                Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('admin.roles.store-permission', $role->id) }}" method="POST" class="max-w-sm mx-auto">
                @csrf
                @method('put')
                <div class="mb-5">
                    <label for="">
                        <span
                            class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">Permissions</span>
                    </label>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        @foreach ($permissions as $permission)
                            <div class="flex items-center">
                                <input type="checkbox" name="permissions[]" value="{{ $permission->name }}"
                                    {{ $role->permissions->contains($permission) ? 'checked' : '' }}
                                    class="rounded border-gray-300 text-green-600 shadow-sm focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-500 dark:focus:border-green-500 dark:focus:ring-green-800 dark:focus:ring-opacity-50">
                                <span class="ml-2 text-sm text-gray-700 dark:text-gray-300">{{ $permission->name }}
                                </span>
                            </div>
                        @endforeach
                    </div>
                </div>
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Submit</button>
            </form>

        </div>
    </div>
</x-admin-layout>
