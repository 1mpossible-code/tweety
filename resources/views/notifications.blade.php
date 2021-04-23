<x-app>
    <div class="mb-3 flex items-center">
        <h3 class="">Notifications</h3>
        <form action="{{ route('notifications.destroy') }}" method="POST" class="float-left block w-full">
            @csrf
            @method('DELETE')
            <x-blue-button>Clear all</x-blue-button>
        </form>
    </div>
    <hr>
    <div>
        @forelse($notifications as $notification)
            <div class="mb-2 pt-2">
                @isset($notification->read_at)
                    <a href="{{ $notification->data['link'] }}" class="text-lg">
                        {{ $notification->data['message'] }}
                    </a>
                @else
                    <a href="{{ $notification->data['link'] }}" class="font-bold text-lg">
                        {{ $notification->data['message'] }}
                    </a>
                @endisset
            </div>
            <hr>
        @empty
            <div class="mt-4">
                No notifications yet
            </div>
        @endforelse
    </div>
</x-app>
