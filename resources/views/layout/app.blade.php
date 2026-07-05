<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel Shop')</title>
</head>
<body>
    @include('layout.partials.header')

    <main>
        @yield('content')
    </main>

    @include('layout.partials.footer')
</body>
</html>