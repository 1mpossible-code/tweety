<x-app>
    <div class="flex justify-center" style="height: 80vh">
        <div class="bg-gray-200 mt-auto mb-auto p-4 rounded-xl w-2/3">
            <h1 class="font-bold text-xl mb-6 text-center">Change password</h1>
            @if(\Illuminate\Support\Facades\Session::exists('error'))
                <p>{{ \Illuminate\Support\Facades\Session::get('error') }}</p>
            @endif
            @if(\Illuminate\Support\Facades\Session::exists('success'))
                <p>{{ \Illuminate\Support\Facades\Session::get('success') }}</p>
            @endif
            <form method="POST" action="{{ route('password.update', $user) }}">
                @csrf

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-gray-700 text-sm" for="password">Old
                        Password</label>
                    <input class="border border-gray-400 p-2 w-full rounded @error('password') border-red-600 @enderror"
                           type="password" name="password"
                           id="password"
                           autocomplete="password" required>
                    @error('password')
                    <span class="font-bold uppercase text-red-600 text-xs">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-gray-700 text-sm" for="new_password">New
                        Password</label>
                    <input
                        class="border border-gray-400 p-2 w-full rounded @error('new_password') border-red-600 @enderror"
                        type="password" name="new_password"
                        id="new_password"
                        autocomplete="new_password" required>
                    @error('new_password')
                    <span class="font-bold uppercase text-red-600 text-xs">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <div class="mb-6">
                    <label
                        class="block mb-2 uppercase font-bold text-gray-700 text-sm @error('new_password_confirmation') border-red-600 @enderror"
                        for="new_password_confirmation">Password Confirmation</label>
                    <input class="border border-gray-400 p-2 w-full rounded" type="password"
                           name="new_password_confirmation"
                           id="new_password_confirmation"
                           autocomplete="new_password" required>
                    @error('new_password_confirmation')
                    <span class="font-bold uppercase text-red-600 text-xs">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <div class="mb-1 flex justify-center">
                    <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 transition py-2 px-6 text-white font-bold uppercase text-sm rounded">
                        Change Password!
                    </button>
                </div>

            </form>
        </div>
    </div>
</x-app>
