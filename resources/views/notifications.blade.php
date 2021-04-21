<x-app>
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
