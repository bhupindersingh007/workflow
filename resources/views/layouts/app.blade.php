<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    {{-- Bootstrap --}}
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])


    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">

</head>

<body>


    @include('partials.header')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/js-sha256/0.11.0/sha256.min.js"></script>
    @stack('scripts')

</body>

</html>