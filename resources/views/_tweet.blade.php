<div class="mt-5">
    <div class="flex flex-row mb-5">
        <div class="flex-shrink-0 mr-4">
            <img src="{{ $tweet->user->avatar }}" class="rounded-full" alt="">
        </div>

        <div class="">
            <div class="w-full inline-block">
                <h5 class="float-left font-bold ml-1">{{ $tweet->user->name }}</h5>
                <span class="float-left mx-1 text-gray-400">@example</span>
                <span class="float-left pt-1 text-bold mx-1 text-gray-400">&dot;</span>
                <span class="float-left">14s</span>
            </div>
            <p>{{ $tweet->body }}</p>

        </div>
    </div>
    <hr>
</div>
