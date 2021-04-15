<x-app>
    <header class="mb-6">
        <div class="banner relative flex justify-center mb-2">
            <img src="{{ $user->banner }}" alt="Banner" class="rounded-3xl">
            <img src="{{ $user->avatar }}"
                 class="rounded-full absolute top-full left-1/2 transform -translate-x-1/2 -translate-y-1/2" alt=""
                 style="width: 100px">
        </div>

        <div class="flex justify-between items-center">
            <div style="max-width: 220px">
                <h2 class="font-bold text-xl mb-0">{{ $user->name }}</h2>
                <p class="text-sm">Hello!</p>
            </div>

            <div>
                @can('edit', $user)
                    <a href="{{ route('profile.edit', $user->username) }}" class="rounded-full border border-gray-300 py-2 px-4 mr-1 text-sm mb-1 block float-left">
                        Edit Profile
                    </a>
                @endcan
                <x-follow-button :user="$user" :isFollowing="$isFollowing"/>
            </div>
        </div>

        <p class="text-sm text-center mt-4">{{ $user->description }}</p>
    </header>

    @include('_timeline', ['tweets' => $tweets])
</x-app>
