<ul>
    <li>
        <a
            href="{{ route('tweets.index') }}"
            class="font-bold text lg mb-4 block"
        >Home</a></li>
    <li>
        <a
            href="/explore"
            class="font-bold text lg mb-4 block"
        >Explore</a></li>
    <li>
        <a
            href="#"
            class="font-bold text lg mb-4 block"
        >Notifications</a></li>
    <li>
        <a
            href="#"
            class="font-bold text lg mb-4 block"
        >Messages</a></li>
    <li>
        <a
            href="#"
            class="font-bold text lg mb-4 block"
        >Bookmarks</a></li>
    <li>
        <a
            href="#"
            class="font-bold text lg mb-4 block"
        >Lists</a></li>
    <li>
        <a
            href="{{ route('profile', auth()->user()) }}"
            class="font-bold text lg mb-4 block"
        >Profile</a></li>
    <li>
        <div class="more-menu">
            <button
                class="font-bold text lg mb-4 block"
            >More</button>
            <div class="more-menu-content">
                <form method="POST" action="/logout">
                    @csrf
                    <button
                        type="submit"
                        class="ml-2 mb-4 block"
                    >Logout</button>
                </form>
            </div>
        </div>
    </li>
</ul>
