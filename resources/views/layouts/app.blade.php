<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('includes.head')
<body>
    <div id="app">
        @include('includes.nav')
        @include('includes.content')
        @if(Auth::check())
        <router-view :userid="{{ Auth::user()->id }}"></router-view>
        <vue-progress-bar></vue-progress-bar>
        @endif
    </div>
</body>
</html>
