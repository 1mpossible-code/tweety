<div class="mt-5">
    <div class="flex flex-row mb-5">
        <div class="flex-shrink-0 mr-4">
            <a href="{{ route('profile', $tweet->user) }}">
                <img src="{{ $tweet->user->avatar }}" class="rounded-full" alt="" style="max-width: 40px">
            </a>
        </div>

        <div class="">
            <div class="w-full inline-block flex items-center">

                <a href="{{ route('profile', $tweet->user) }}">
                    <h5 class="float-left font-bold ml-1">{{ $tweet->user->name }}</h5>
                    <span class="float-left mx-1 text-gray-400">{{ '@'.$tweet->user->username }}</span>
                </a>
                <span class="float-left text-bold mx-1 text-gray-400 translate-y-1.5 transform">&dot;</span>
                <span class="float-left text-xs mx-1 text-gray-400">{{ $tweet->created_at->diffForHumans() }}</span>
            </div>
            <p>{{ $tweet->body }}</p>

        </div>
    </div>
    <hr>
</div>
