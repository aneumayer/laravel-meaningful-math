<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', config('app.name'))</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-icons.min.css') }}" rel="stylesheet">
</head>
<body>
     <div style="position: absolute; top: 1rem; right: 2rem; z-index: 1000;">
        @auth
            <a href="{{ route('logout') }}" title="Logout">
                <i class="bi bi-box-arrow-right" style="font-size: 1.5rem; color: white;"></i>
            </a>
        @else
            <a href="{{ route('login') }}" title="Login">
                <i class="bi bi-box-arrow-in-right" style="font-size: 1.5rem; color: white;"></i>
            </a>
        @endauth
    </div>
    <div class="container">
        @yield('content')
    </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>