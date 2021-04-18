<x-app>
    @livewire('search-users')
    <div>
        @foreach($users as $user)
            <x-user-mini-card :user="$user" />
        @endforeach
            <hr>
            <br>
            {{ $users->links() }}
    </div>
</x-app>
