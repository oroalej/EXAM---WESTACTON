@extends('layouts.master')
@section('content')
    <div class="container" id="app">
        @include('layouts.header')
        <main class="pt-4 pb-4">
            @yield('main')
        </main>
    </div>
@endsection
