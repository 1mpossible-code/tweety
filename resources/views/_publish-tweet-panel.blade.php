<div class="flex border-b-8 pb-4 mb-10">
    <div class="flex-shrink-0 float-left">
        <img src="{{ auth()->user()->avatar }}" class="float-right rounded-full mx-2 mt-2" alt="your avatar"
             style="max-width: 50px">
    </div>
    <form action="{{ route('tweets.store') }}" class="w-full float-left" method="POST" enctype="multipart/form-data">
        @csrf

        <textarea name="body"
                  class="w-full"
                  placeholder="What`s happening?"
                  required
        ></textarea>

        <input type="file" name="image">

        @error('body')
        <p class="text-red-600 font-bold text-sm float-left">{{ $message }}</p>
        @enderror

        <button type="submit"
                class="float-right py-2 text-sm px-6 bg-blue-200 font-bold rounded-full text-white hover:bg-blue-400 transition"
        >
            Tweet
        </button>
    </form>
</div>
