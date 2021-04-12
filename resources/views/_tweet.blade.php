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
            <p class="mb-2">{{ $tweet->body }}</p>

            <div class="flex">
                <form action="{{ route('tweetLike.store', $tweet) }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="flex items-center {{ $tweetLikeService->isLikedBy($tweet, auth()->user()) ? 'text-blue-500' : 'text-gray-500' }}">
                        <img src="/images/post/thumb-up.svg" alt="thumb-up" class="w-4 mr-2">
                        <span class="text-sm mr-3">
                            {{ $tweet->likes ?? 0 }}
                        </span>
                    </button>
                </form>

                <form action="{{ route('tweetLike.destroy', $tweet) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="flex items-center {{ $tweetLikeService->isDislikedBy($tweet, auth()->user()) ? 'text-blue-500' : 'text-gray-500' }}">
                        <img src="/images/post/thumb-down.svg" alt="thumb-down" class="w-4 mr-2">
                        <span class="text-sm">
                            {{ $tweet->dislikes ?? 0 }}
                        </span>
                    </button>
                </form>

            </div>
        </div>
    </div>
    <hr>
</div>
