<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>  
    @include('includes.style')
    @stack('addon-style')
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    @include('includes.navbar')
    @yield('content') 
    @include('includes.script')
    @stack('addon-script')
</body> 
</html>