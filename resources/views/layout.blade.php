<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @yield('title')

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{url('css/styles.css')}}"/>
</head>

<body class="antialiased">

    <div class="relative py-4 px-6">
        <nav>
            <a href="{{route('home.index')}}">Home</a>
            <a href="{{route('home.about')}}">About</a>
            <a href="{{route('computers.index')}}">Computers</a>
            <a href="{{route('computers.create')}}">Create Computer</a>
            <a href="{{route('home.contact')}}">Contact</a>
        </nav>
    </div>

    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        @yield('content')
    </div>

</body>

</html>
