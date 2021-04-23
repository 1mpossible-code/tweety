<x-app>
    <h1 class="mb-4">{{ $user->name }} followers</h1>
    <hr>
    @forelse($user->followers as $follower)
        <div class="my-2">
            <x-user-mini-card :user="$follower" />
        </div>
    @empty
        No followers yet
    @endforelse
</x-app>
