@extends('layouts.app')

@section('content')
    <h3 class="pb-3 mb-3 border-b">Home</h3>
    @if(\Illuminate\Support\Facades\Session::has('error'))
        <div class="text-sm font-bold text-red-600">{{ \Illuminate\Support\Facades\Session::get('error') }}</div>
    @endif

    @include('_publish-tweet-panel')
    @include('_timeline')
@endsection
