<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@stack('title', 'Default Title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>AdVibe</title>
</head>

<body class="{{ request()->routeIs('homepage') ? 'bg-1' : 'bg-page-form' }}">
    <x-navbar />

    <div class="min-vh-md-100">
        {{ $slot }}
    </div>

    <x-footer />
</body>

</html>

