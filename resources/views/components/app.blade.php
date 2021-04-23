<x-master>
    <section class="px-4 container m-auto">
        <main>
            <div class="lg:flex justify-between">
                {{-- Left sidebar --}}
                <div class="lg:w-1/6 xl:1/5 pt-4">
                    <header class="mb-3">
                        <h1>
                            <a href="{{ route('tweets.index') }}"><img src="/images/logo.svg" alt="Logo"></a>
                        </h1>
                    </header>
                    @include('_sidebar-links')
                </div>
                {{-- Content --}}
                <div class="lg:flex-1 lg:px-4 pt-4 border-l border-r" style="max-width: 700px;">
                    {{ $slot }}
                </div>
                {{-- Left sidebar --}}
                <div class="lg:w-1/4 xl:w-1/5 pt-4" style="max-width: 300px">
                    @include('_following-list')
                </div>
            </div>
        </main>
    </section>
</x-master>
