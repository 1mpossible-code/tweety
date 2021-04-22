<x-app>
    <h3 class="pb-3 mb-3 border-b">Notifications</h3>
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
            No notifications yet
        @endforelse
    </div>
</x-app>
