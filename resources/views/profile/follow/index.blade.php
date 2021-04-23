<x-app>
    <h1 class="mb-4">{{ $user->name }} following</h1>
    <hr>
    @forelse($user->follows as $follow)
        <div class="my-2">
            <x-user-mini-card :user="$follow" />
        </div>
    @empty
        No followers yet
    @endforelse
</x-app>
