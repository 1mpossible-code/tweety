<div class="w-full m-auto">
    <div class="bg-gray-100 rounded-2xl py-2 px-4 ml-4">
        <h3 class="font-bold text-xl mb-4">Following</h3>

        <ul>
            @foreach(auth()->user()->follows as $user)
                <li>
                    <div class="flex items-center my-4 lg:text-sm md:text-xs">
                        <a href="{{ route('profile', $tweet->user) }}"
                           class="flex-1 flex flex-row items-center mr-4">
                            <img
                                src="{{ $user->avatar }}"
                                alt=""
                                class="rounded-full mr-2"
                            >
                            <div class="">
                                <div class="text-md">{{ $user->name }}</div>
                                <div class="font-weight-light text-gray-400 text-sm">@johndoe</div>
                            </div>
                        </a>
                    </div>
                </li>
                <hr>
            @endforeach
        </ul>
    </div>
</div>
