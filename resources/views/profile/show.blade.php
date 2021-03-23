<x-app>
    <header class="mb-6">
        <div class="banner relative">
            <img src="/images/default-profile-banner.jpg" alt="Banner" class="rounded-3xl mb-2">
            <img src="{{ $user->avatar }}" class="rounded-full absolute" alt=""
                 style="width: 100px; top: calc(100% - 50px); left: calc(50% - 50px)">
        </div>

        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-bold text-xl mb-0">{{ $user->name }}</h2>
                <p class="text-sm">Hello!</p>
            </div>

            <div>
                <a href="" class="rounded-full border border-gray-300 py-2 px-4 mr-1 text-sm">Edit Profile</a>
                <a href="" class="bg-blue-500 rounded-full shadow py-2 px-4 text-white text-sm">Follow Me</a>
            </div>
        </div>

        <p class="text-sm text-center mt-4">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. A cum fugiat illum inventore ipsam provident quas
            sequi sunt unde vel.
        </p>
    </header>

    @include('_timeline', ['tweets' => $user->tweets])
</x-app>
