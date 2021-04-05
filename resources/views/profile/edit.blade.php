<x-app>
    <div class="mb-6">
        <h2 class="text-xl font-bold">Edit the profile</h2>
        @if(\Illuminate\Support\Facades\Session::has('error'))
            <p class="text-red-500 mt-2 text-bold">{{ \Illuminate\Support\Facades\Session::get('error') }}</p>
        @endif
    </div>

    <form action="{{ route('profile', $user) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="mb-6">
            <label for="name">Name</label>
            <input class="border border-gray-400 p-2 w-full" type="text" name="name" value="{{ $user->name }}" required>
            @error('name')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="username">Username</label>
            <input class="border border-gray-400 p-2 w-full" type="text" name="username" value="{{ $user->username }}"
                   required>
            @error('username')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
                <label for="avatar">Avatar</label>
            <div class="flex">
                <input class="border border-gray-400 p-2 w-full" type="file" name="avatar">
                <img src="{{ $user->avatar }}" alt="your avatar" width="40">
            </div>
            @error('avatar')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="email">Email</label>
            <input class="border border-gray-400 p-2 w-full" type="email" name="email" value="{{ $user->email }}"
                   required>
            @error('email')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="password">Password</label>
            <input class="border border-gray-400 p-2 w-full" type="password" name="password" required>
            @error('password')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="password_confirmation">Password Confirm</label>
            <input class="border border-gray-400 p-2 w-full" type="password" name="password_confirmation" required>
            @error('password_confirmation')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 transition">Submit
            </button>
        </div>

    </form>
</x-app>
