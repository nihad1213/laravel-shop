<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel Shop')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div>
        @include('layouts.partials.header')
    
            <main>
                @yield('content')
            </main>
    
        @include('layouts.partials.footer')
    </div>
</body>
</html>