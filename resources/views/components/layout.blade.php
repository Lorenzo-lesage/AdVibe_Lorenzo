<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@stack('title', 'Default Title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>AdVibe</title>
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css">



</head>

<body class="bg-tot overflow-x-hidden">
    <x-navbar />

    <div class="min-vh-md-100">
        {{ $slot }}
    </div>

    <x-footer />
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
</body>

</html>
