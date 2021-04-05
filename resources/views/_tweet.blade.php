<div class="mt-5">
    <div class="flex flex-row mb-5">
        <div class="flex-shrink-0 mr-4">
            <a href="{{ route('profile', $tweet->user->name) }}">
                <img src="{{ $tweet->user->avatar }}" class="rounded-full" alt="" style="max-width: 40px">
            </a>
        </div>

        <div class="">
            <div class="w-full inline-block">

                <a href="{{ route('profile', $tweet->user) }}">
                    <h5 class="float-left font-bold ml-1">{{ $tweet->user->name }}</h5>
                </a>

                <a href="{{ route('profile', $tweet->user) }}">
                    <span class="float-left mx-1 text-gray-400">{{ '@'.$tweet->user->username }}</span>
                </a>
                <span class="float-left pt-1 text-bold mx-1 text-gray-400">&dot;</span>
                <span class="float-left">14s</span>
            </div>
            <p>{{ $tweet->body }}</p>

        </div>
    </div>
    <hr>
</div>
