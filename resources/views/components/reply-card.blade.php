<div class="mt-4 flex" id="reply-{{ $reply->id }}">
    <div class="flex-shrink-0 mr-4">
        <a href="{{ route('profile', $reply->user) }}">
            <img src="{{ $reply->user->avatar }}" class="rounded-full" alt="" style="max-width: 30px">
        </a>
    </div>
    <div class="flex flex-col w-full ml-1">
        <a href="{{ route('profile', $reply->user) }}">
            <h5 class="float-left italic">{{ $reply->user->name }} said...</h5>
        </a>
        <p class="text-sm mb-2">{{ $reply->body }}</p>
    </div>
    @can('edit', $reply->user)
        <form method="POST" action="{{ route('reply.destroy', $reply) }}" class="ml-4">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-sm text-red-600">DELETE</button>
        </form>
    @endcan
</div>
