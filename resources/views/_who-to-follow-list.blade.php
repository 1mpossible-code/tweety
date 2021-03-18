<div class="w-full m-auto">
    <div class="bg-gray-100 rounded-2xl py-2 px-4 ml-4">
        <h3 class="font-bold text-xl mb-4">Who to follow</h3>

        <ul>
            @foreach(range(1,3) as $index)
                <li>
                    <div class="flex items-center my-4 lg:text-sm md:text-xs">

                        <div class="flex-1 flex flex-row items-center mr-4">
                            <img
                                src="https://i.pravatar.cc/40"
                                alt=""
                                class="rounded-full mr-2"
                            >
                            <div class="">
                                <div class="text-md">John Doe</div>
                                <div class="font-weight-light text-gray-400 text-sm">@johndoe</div>
                            </div>
                        </div>
                        <form class="ml-2" action="">
                            <button class="rounded-full text-blue-400 border-blue-400 border xl:px-3 lg:px-1 py-1">Follow</button>
                        </form>
                    </div>
                </li>
                <hr>
            @endforeach
        </ul>
    </div>
</div>
