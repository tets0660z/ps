<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('includes.head')
<body>
    <div id="app">
        @include('includes.nav')
        @include('includes.content')
    <router-view></router-view>
    </div>
</body>
</html>
