<x-app>
    <header class="mb-6">
        <div class="banner relative flex justify-center mb-2">
            <figure>
                <img src="{{ $user->banner }}" alt="Banner" width="100%" height="100%" class="h-auto rounded-3xl">
            </figure>
            <img src="{{ $user->avatar }}"
                 class="rounded-full absolute top-full left-1/2 transform -translate-x-1/2 -translate-y-1/2" alt=""
                 style="width: 100px">
        </div>

        <div class="flex justify-between items-center">
            <div style="max-width: 220px">
                <h2 class="font-bold text-xl mb-0">{{ $user->name }}</h2>
                <p class="text-sm text-gray-400">{{ '@'.$user->username }}</p>
            </div>

            <div>
                @can('edit', $user)
                    <a href="{{ route('profile.edit', $user->username) }}"
                       class="rounded-full border border-gray-300 py-2 px-4 mr-1 text-sm mb-1 block float-left">
                        Edit Profile
                    </a>
                @endcan
                <x-follow-button :user="$user" :isFollowing="$isFollowing"/>
            </div>
        </div>

        <p class="text-sm text-center mt-4">{{ $user->description }}</p>
        <div>
            <a href="{{ route('follow.index', $user) }}">
                <span class="text-gray-700 font-bold">{{ count( $user->follows ) }}</span><span
                    class="text-gray-400 mr-4"> Following</span>
            </a>
            <a href="{{ route('follower.index', $user) }}">
                <span class="text-gray-700 font-bold">{{ count( $user->followers ) }}</span><span
                    class="text-gray-400"> Followers</span>
            </a>
        </div>
    </header>

    @include('_timeline', ['tweets' => $tweets])
</x-app>
