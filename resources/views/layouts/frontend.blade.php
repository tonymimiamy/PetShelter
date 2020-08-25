<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    @include('layouts.head')
</head>
<body>
    @include('layouts.header')

    @yield('hero')
    @yield('page-title')
    @yield('content')
    @include('layouts.footer')


</body>
    @include('layouts.js')

    @yield('script')
</html>