<div class="flex flex-col md:w-2/5">
    <input class="border border-gray-400 rounded-full block px-4 py-2" wire:model="search" type="text"
           placeholder="Search users...">

    <ul class="mb-4">
        @foreach($users as $user)
            <div class="border-b">
                <x-user-mini-card :user="$user"/>
            </div>
        @endforeach
    </ul>
</div>
