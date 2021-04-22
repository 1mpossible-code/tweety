<x-app>
    @include('_tweet')
    <hr class="mt-5 mb-2">
    <div class="p-2 mb-10">
        <form action="{{ route('reply.store', $tweet) }}" method="POST">
            @csrf
            <livewire:publish-textarea :placeholder="'Leave reply'"
                                       :textareaClass="'mb-2 rounded-xl border py-2 px-4'"/>
            <div class="float-left">
                <button type="submit"
                        class="ml-4 float-left py-1 text-sm px-4 rounded-full hover:bg-gray-200 border border-gray-500 transition"
                >Send!
                </button>
            </div>
        </form>
    </div>
    <div class="px-2">
        <hr>
        @forelse($replies as $reply)
            <div class="mt-4 flex">
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
            <hr class="mt-2">
        @empty
            <div class="mt-4">No replies yet</div>
        @endforelse
    </div>
</x-app>
