@if(auth()->user()->isNot($user))
    <form method="POST" action="{{ route('follow', $user->name) }}" class="float-left mb-1">
        @csrf
        <button type="submit"
                class="rounded-full shadow py-2 px-4 text-sm @if($isFollowing) border border-gray-200 @else bg-blue-500 text-white @endif ">
            {{ $isFollowing ? 'Unfollow' : 'Follow' }}
        </button>
    </form>
@endif
