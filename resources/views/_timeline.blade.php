<div>
    @forelse($tweets as $tweet)
        @include('_tweet')
    @empty
        <p class="p-4">No tweets yet</p>
    @endforelse

    {{ $tweets->links() }}
</div>
