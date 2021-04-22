<div>
    @forelse($tweets as $tweet)
        @include('_tweet')
        <div class="my-2 ml-4">
            <a class="text-sm text-gray-400 hover:text-gray-700 transition" href="{{ $tweet->path }}">See replies ({{ count($tweet->replies)  }})</a>
        </div>
        <hr>
    @empty
        <p class="p-4">No tweets yet</p>
    @endforelse

    {{ $tweets->links() }}
</div>
