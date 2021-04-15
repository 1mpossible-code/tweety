<x-master>
    <div class="flex justify-center" style="height: 80vh">
        <div class="bg-gray-200 mt-auto mb-auto p-4 rounded-xl md:w-1/3">
            <h1 class="font-bold text-xl mb-6 text-center">Login</h1>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-gray-700 text-sm" for="email">Email</label>
                    <input class="border border-gray-400 p-2 w-full rounded @error('email') is-invalid @enderror"
                           type="email" name="email" id="email"
                           autocomplete="email" value="{{ old('email') }}" required>

                    @error('email')
                    <span class="font-bold uppercase text-red-600 text-xs">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-gray-700 text-sm" for="password">Password</label>
                    <input class="border border-gray-400 p-2 w-full rounded" type="password" name="password"
                           id="password"
                           autocomplete="password" value="{{ old('password') }}" required>
                    @error('password')
                    <span class="font-bold uppercase text-red-600 text-xs">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <div class="mb-6 flex items-center">
                    <input class="border border-gray-400 p-2 mr-1" type="checkbox" name="remember"
                           id="remember" {{ old('remember' ? 'checked' : '') }}>
                    <label class="block uppercase font-bold text-gray-700 text-sm" for="remember">Remember me</label>
                </div>

                <div class="mb-6 flex justify-center">
                    <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 transition py-2 px-6 text-white font-bold uppercase text-sm rounded">
                        Login
                    </button>
                </div>

                @if (Route::has('password.request'))
                    <div>
                        <a class="text-blue-300 hover:text-red-300 transition" href="{{ route('register') }}">
                            Not registered yet?
                        </a>

                        <a class="text-blue-300 hover:text-red-300 transition" href="{{ route('password.request') }}">
                            Forgot your password?
                        </a>
                    </div>
                @endif

            </form>
        </div>
    </div>
</x-master>
