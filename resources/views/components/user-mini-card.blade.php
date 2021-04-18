<a href="{{ route('profile', $user) }}" class="flex items-center mb-5">
    <img src="{{ $user->avatar }}" alt="avatar" width="40px" class="mr-4 rounded">
    <div>
        <h4 class="font-bold mr-4">{{ $user->name }}</h4>
    </div>
    <div>
        <h4>{{ '@'.$user->username }}</h4>
    </div>
</a>
