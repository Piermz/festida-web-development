<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'InternPortal')</title>
    @stack('before-styles')
    <link href="{{asset('output.css')}}" rel="stylesheet">
    @stack('after-styles')
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />
    <!-- CSS for carousel/flickity-->
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
     <!-- Styles -->
     @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

    @yield('content')

    @stack('before-scripts')

    @stack('after-scripts')

</html>
