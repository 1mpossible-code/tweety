@extends('layouts.app')

@section('content')
    <div class="lg:flex justify-between">
        {{-- Second sidebar --}}
        <div class="lg:w-1/6 xl:1/5 pt-4">
            <header class="mb-3">
                <h1>
                    <img src="/images/logo.svg" alt="Logo">
                </h1>
            </header>
            @include('_sidebar-links')
        </div>
        {{-- Second sidebar --}}
        <div class="lg:flex-1 lg:px-4 pt-4 border-l border-r" style="max-width: 700px;">
            <h3 class="pb-3 mb-3 border-b">Home</h3>
            @include('_publish-tweet-panel')

            @foreach($tweets as $tweet)
                @include('_tweet')
            @endforeach
        </div>
        {{--Third sidebar--}}
        <div class="lg:w-1/4 xl:w-1/5 pt-4" style="max-width: 300px">
            @include('_following-list')
            <br>
            @include('_who-to-follow-list')
        </div>
    </div>
@endsection
