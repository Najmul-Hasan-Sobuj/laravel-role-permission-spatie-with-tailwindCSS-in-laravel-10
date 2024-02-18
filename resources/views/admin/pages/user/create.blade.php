<x-admin-layout>
    <x-slot name="header">
        <div class="grid grid-cols-2">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('User Create') }}
            </h2>
            <a href="{{ url()->previous() }}"
                class="px-4 py-2 text-sm text-white bg-green-600 rounded hover:bg-blue-600 text-center">
                Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('admin.users.store') }}" method="POST" class="max-w-sm mx-auto">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                    <input type="text" name="name" id="name"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        value="{{ old('name') }}">
                    @error('name')
                        <p class="text-red-500 text-xs italic mt-4">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                    <input type="email" name="email" id="email"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        value="{{ old('email') }}">
                    @error('email')
                        <p class="text-red-500 text-xs italic mt-4">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                    <div class="flex">
                        <input type="password" name="password" id="password"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <button type="button" onclick="togglePasswordVisibility('password')"
                            class="ml-2 px-4 py-2 text-sm text-white bg-green-600 rounded hover:bg-blue-600 text-center">Show</button>
                    </div>
                    @error('password')
                        <p class="text-red-500 text-xs italic mt-4">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2">Password
                        Confirmation</label>
                    <div class="flex">
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <button type="button" onclick="togglePasswordVisibility('password_confirmation')"
                            class="ml-2 px-4 py-2 text-sm text-white bg-green-600 rounded hover:bg-blue-600 text-center">Show</button>
                    </div>
                    @error('password_confirmation')
                        <p class="text-red-500 text-xs italic mt-4">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="role" class="block text-gray-700 text-sm font-bold mb-2">Role</label>
                    <select name="roles[]" id="role" multiple
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                    @error('role')
                        <p class="text-red-500 text-xs italic mt-4">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit"
                        class="px-4 py-2 text-sm text-white bg-green-600 rounded hover:bg-blue-600 text-center">Create</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function togglePasswordVisibility(inputId) {
            const input = document.getElementById(inputId);
            const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
            input.setAttribute('type', type);
            event.target.textContent = type === 'password' ? 'Show' : 'Hide';
        }
    </script>
</x-admin-layout>
