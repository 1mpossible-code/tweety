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
            <x-reply-card :reply="$reply" />
            <hr class="mt-2">
        @empty
            <div class="mt-4">No replies yet</div>
        @endforelse
    </div>
</x-app>
