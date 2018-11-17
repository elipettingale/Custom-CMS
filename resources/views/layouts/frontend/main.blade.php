<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link href="{{ asset('css/frontend/app.css') }}" rel="stylesheet">
    @stack('styles')
    @stack('meta')
</head>
<body>
@include('partials.frontend.header')
<div class="container">
    <div class="row">
        @yield('content')
    </div>
</div>
@include('partials.frontend.footer')
<script src="{{ asset('js/frontend/app.js') }}"></script>
@stack('scripts')
</body>
</html>
