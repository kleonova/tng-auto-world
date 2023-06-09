<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite(['resources/css/app.scss'])
</head>
<body>
    <x-navbar />

    <main class="container">
        <aside>
            @yield('aside')
        </aside>

        <div class="container">
            @yield('content')
        </div>
    </main>

    <div class="toast-wrapper">
        @if ($message = Session::get('alert'))
            <x-toast message='{{ $message }}' />
        @endif
    </div>


    @vite(['resources/js/app.js'])
</body>
</html>
