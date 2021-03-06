<div class="flex border-b-8 pb-4 mb-10">
    <div class="flex-shrink-0 float-left">
        <img src="{{ auth()->user()->avatar }}" class="float-right rounded-full mx-2 mt-2" alt="your avatar"
             style="max-width: 50px">
    </div>
    <form action="{{ route('tweets.store') }}" class="w-full float-left" method="POST" enctype="multipart/form-data">
        @csrf

        <livewire:publish-textarea :placeholder="'What`s happening?'" />
        <input type="file" name="image">

        @error('body')
        <p class="text-red-600 font-bold text-sm float-left">{{ $message }}</p>
        @enderror

        <x-blue-button>Tweet</x-blue-button>
    </form>
</div>
