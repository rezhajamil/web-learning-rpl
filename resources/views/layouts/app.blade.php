<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('layouts.header')
    <title>Web Pembelajaran Learning Pemrograman Dasar XI RPL 1</title>
</head>
<body>
    @yield('content')
    
    @include('layouts.footer')
    @include('layouts.scripts')
    @yield('scripts')
</body>
</html>