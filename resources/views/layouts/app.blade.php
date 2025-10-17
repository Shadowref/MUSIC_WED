<!DOCTYPE html>
<html lang="vi" x-data="{ mobileMenuOpen: false }" class="h-full bg-gray-100 dark:bg-gray-900">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Cập nhật tin tức âm nhạc mới nhất, tin hot về các nghệ sĩ, sự kiện và các thể loại nhạc nổi bật">
    <meta name="author" content="Music News">
    <meta name="robots" content="index, follow">
    <title>@yield('title', config('app.name', 'Music News'))</title>

    <!-- Fonts & Styles -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
</head>

<body class="font-sans antialiased">

    <!-- Header -->
    @include('partials.header')

    <!-- Nội dung chính từng trang -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        @yield('content')
    </main>

    <!-- Footer tĩnh -->
    <footer class="bg-gray-800 text-white py-8 mt-16">
        <div class="max-w-7xl mx-auto text-center text-sm">
            &copy; {{ date('Y') }} Music News. All rights reserved.
        </div>
    </footer>

    <!-- Scripts -->
    @stack('scripts')

</body>
</html>
