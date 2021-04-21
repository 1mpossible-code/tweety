<ul>
    <li>
        <a
            href="{{ route('tweets.index') }}"
            class="font-bold text lg mb-4 block"
        >Home</a></li>
    <li>
        <a
            href="{{ route('explore.index') }}"
            class="font-bold text lg mb-4 block"
        >Explore</a></li>
    <li>
        <a
            href="{{ route('notifications.index') }}"
            class="font-bold text lg mb-4 block"
        >Notifications @if(count(auth()->user()->unreadnotifications) > 0) <span class="text-red-600 ml-2">{{ count(auth()->user()->unreadnotifications) }}</span> @endif</a></li>
    <li>
        <a
            href="{{ route('profile', auth()->user()) }}"
            class="font-bold text lg mb-4 block"
        >Profile</a></li>
    <li>
        <div class="more-menu">
            <button
                class="dropbtn font-bold text lg mb-4 block" onclick="moreDropdown()"
            >More
            </button>
            <div id="more-menu-content" class="more-menu-content">
                <form method="POST" action="/logout">
                    @csrf
                    <button
                        type="submit"
                        class="ml-2 mb-4 block"
                    >Logout
                    </button>
                </form>
            </div>
        </div>
    </li>
</ul>

<link rel="stylesheet" href="/css/more-button.css">
<script src="/js/more-button.js"></script>
