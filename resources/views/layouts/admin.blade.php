<!DOCTYPE html>
<html lang="vi" x-data="{ sidebarOpen: false }" class="h-full bg-gray-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard Quản Trị') - {{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
</head>
<body class="bg-slate-900">

    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar (Thanh bên) -->
        <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" @click.away="sidebarOpen = false" class="fixed inset-y-0 left-0 w-64 bg-gray-800 text-white shadow-lg transform transition-transform duration-300 md:translate-x-0 md:static md:inset-0 z-40">

            <div class="flex items-center justify-between p-6 border-b border-indigo-800">
                <!-- Logo hoặc Tên Website -->
                <h2 class="text-3xl font-semibold tracking-wide text-indigo-400">Admin Panel</h2>

                <!-- Nút đóng Sidebar (Chỉ hiển thị trên di động) -->
                <button @click="sidebarOpen = false" class="md:hidden focus:outline-none text-white hover:text-indigo-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Navigation Links -->
            <nav class="mt-6 px-4 flex flex-col gap-4">
                <!-- Dashboard -->
                <x-admin-nav-link href="{{ route('admin.dashboard') }}" :active="request()->routeIs('admin.dashboard')">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18v18H3V3z" />
                    </svg>
                    Dashboard
                </x-admin-nav-link>

                <!-- Loại tin -->
                <x-admin-nav-link href="{{ route('admin.categories.index') }}" :active="request()->routeIs('admin.categories.*')">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    Loại tin
                </x-admin-nav-link>

                <!-- Tin tức -->
                <x-admin-nav-link href="{{ route('admin.news.index') }}" :active="request()->routeIs('admin.news.*')">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Tin tức
                </x-admin-nav-link>

                <!-- Người dùng -->
                <x-admin-nav-link href="{{ route('admin.users.index') }}" :active="request()->routeIs('admin.users.*')">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 14a4 4 0 10-8 0m8 0H8m8 0a4 4 0 11-8 0" />
                    </svg>
                    Người dùng
                </x-admin-nav-link>

                <!-- Thêm vào sidebar -->
                <x-admin-nav-link href="{{ route('admin.comments.index') }}" :active="request()->routeIs('admin.comments.*')">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c1.104 0 2 .896 2 2s-.896 2-2 2-2-.896-2-2 .896-2 2-2zm0 6c1.104 0 2 .896 2 2s-.896 2-2 2-2-.896-2-2 .896-2 2-2z" />
                    </svg>
                    Bình luận
                </x-admin-nav-link>

            </nav>

            <!-- Footer (Có thể thêm các thông tin bổ sung như phiên bản, thông tin bản quyền...) -->
            <div class="absolute bottom-0 w-full px-4 py-2 text-center text-gray-400">
                <p>&copy; 2025 Admin Panel. All rights reserved.</p>
            </div>

        </aside>


        <!-- Nội dung chính -->
        <div class="flex-1 flex flex-col overflow-hidden bg-gray-50">
            <!-- Header -->
            <header class="flex items-center justify-between bg-white shadow-md px-6 py-4">
                <div class="flex items-center">
                    <!-- Nút mở Sidebar trên di động -->
                    <button @click="sidebarOpen = !sidebarOpen" class="text-gray-500 focus:outline-none md:hidden mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                    <h1 class="text-2xl font-semibold text-gray-800">@yield('page_title', 'Trang Quản Trị')</h1>
                </div>

                <div class="flex items-center gap-6 ml-4">
                    <!-- Thông tin người dùng khi đã đăng nhập -->
                    @auth
                        <div class="relative" id="avatar-container">
                            <div class="flex items-center space-x-2 cursor-pointer" onclick="toggleAvatarMenu()">
                                <img src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : asset('images/default-avatar.png') }}" alt="Avatar" class="h-9 w-9 rounded-full border border-gray-300 object-cover shadow">
                                <span class="text-gray-700 dark:text-gray-200 font-semibold text-sm">
                                    {{ Auth::user()->name }}
                                </span>
                            </div>
                            <!-- Menu avatar khi click -->
                            <div id="avatar-menu" class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow-lg hidden z-20">
                                <a href="{{ route('profile') }}" class="block px-4 py-2 text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 transition">Trang cá nhân</a>
                                <form action="{{ route('logout') }}" method="POST" class="border-t border-gray-200 dark:border-gray-700">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-4 py-2 text-red-600 hover:bg-red-100 dark:hover:bg-gray-700 transition">Đăng xuất</button>
                                </form>
                            </div>
                        </div>
                    @else
                        <!-- Nếu chưa đăng nhập, hiển thị nút Đăng nhập và Đăng ký -->
                        <a href="{{ route('login') }}" class="text-sm px-4 py-1.5 border rounded hover:bg-gray-100 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-200">Đăng nhập</a>
                        <a href="{{ route('register') }}" class="text-sm px-4 py-1.5 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Đăng ký</a>
                    @endauth
                </div>
            </header>

            <!-- Nội dung trang -->
            <main class="flex-1 overflow-y-auto p-8">
                <div class="max-w-7xl mx-auto">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <!-- Script điều khiển menu avatar -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const avatarMenu = document.getElementById('avatar-menu');
            const avatarContainer = document.getElementById('avatar-container');

            // Mở/đóng menu avatar khi click vào avatar
            avatarContainer.addEventListener('click', function () {
                avatarMenu.classList.toggle('hidden');
            });

            // Đóng menu khi click ra ngoài
            document.addEventListener('click', function (e) {
                if (!avatarContainer.contains(e.target)) {
                    avatarMenu.classList.add('hidden');
                }
            });
        });
    </script>
</body>
</html>
