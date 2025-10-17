<!DOCTYPE html>
<html lang="vi" class="h-full bg-gray-100 dark:bg-gray-900">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Cập nhật tin tức âm nhạc mới nhất, sự kiện, nghệ sĩ nổi bật và các thể loại nhạc đang thịnh hành">
    <meta name="author" content="Music News">
    <meta name="robots" content="index, follow">
    <title>@yield('title', config('app.name', 'Tin Tức Âm Nhạc'))</title>

    <!-- Fonts & Styles -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Biểu tượng trang -->
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
</head>

<body class="font-sans antialiased" x-data="{ mobileMenuOpen: false }">
    <nav class="bg-white dark:bg-gray-800 shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3 flex items-center justify-between">

            {{-- Trái: Logo --}}
            <div class="flex-shrink-0">
                <a href="{{ route('home') }}" class="flex items-center text-xl font-semibold text-blue-600 hover:text-blue-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 18V5l-7 2V7l7-2 8-3v13l-8 3z"/>
                    </svg>
                    Tin Tức Âm Nhạc
                </a>
            </div>

     <!-- Giữa: Dropdown + Tìm kiếm -->
<div class="flex items-center gap-3 justify-center px-2 max-w-md mx-auto">

    <style>
      .custom-dropdown {
        position: relative;
        width: 8rem;
        border-radius: 0.5rem;
        background-color: #bfdbfe;
        overflow: hidden;
      }
      .custom-dropdown::before {
        content: '';
        position: absolute;
        width: 1.5rem;
        height: 1.5rem;
        right: 0;
        top: 0.25rem;
        background-color: #60a5fa;
        border-radius: 50%;
        filter: blur(8px);
        box-shadow: -30px 10px 5px 5px rgba(59,130,246,0.4);
        z-index: 0;
      }
      .custom-dropdown svg {
        position: absolute;
        right: 0.25rem;
        top: 0.25rem;
        width: 1rem;
        height: 1rem;
        stroke: #3b82f6;
        transform: rotate(-45deg);
        transition: transform 0.3s;
        z-index: 1;
      }
      .custom-dropdown:hover svg {
        transform: rotate(0deg);
      }
      select.custom-select {
        position: relative;
        width: 100%;
        padding: 0.25rem 1.25rem 0.25rem 0.5rem;
        border-radius: 0.5rem;
        border: 2px solid #60a5fa;
        background: transparent;
        color: #1e40af;
        font-weight: 600;
        font-size: 0.75rem;
        outline: none;
        appearance: none;
        z-index: 2;
        cursor: pointer;
      }
      select.custom-select:focus {
        border-color: #3b82f6;
        box-shadow: 0 0 3px #3b82f6;
      }

      .group {
        display: flex;
        align-items: center;
        position: relative;
        max-width: 200px;
        flex-grow: 1; /* để thanh tìm kiếm co dãn rộng */
      }
      .input {
        height: 32px;
        line-height: 20px;
        width: 100%;
        padding-left: 1.5rem;
        padding-right: 0.5rem;
        border: 2px solid transparent;
        border-radius: 6px;
        outline: none;
        background-color: #1E3A8A;
        color: #f0f0f0;
        box-shadow: 0 0 3px #2563EB, 0 0 0 5px #dbeafeeb;
        font-size: 0.875rem;
        transition: 0.3s ease;
      }
      .input::placeholder {
        color: #cbd5e1;
      }
      .input:focus {
        border-color: #2563EB;
        box-shadow: 0 0 4px #3B82F6;
        background-color: #2563EB;
        color: #fff;
      }
      .icon {
        position: absolute;
        left: 0.5rem;
        fill: #cbd5e1;
        width: 1rem;
        height: 1rem;
        pointer-events: none;
      }
    </style>

    <div class="custom-dropdown">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid meet">
        <path stroke-width="4" stroke-linejoin="round" stroke-linecap="round" fill="none"
          d="M60.7,53.6,50,64.3m0,0L39.3,53.6M50,64.3V35.7m0,46.4A32.1,32.1,0,1,1,82.1,50,32.1,32.1,0,0,1,50,82.1Z">
        </path>
      </svg>
      <select onchange="location = this.value;" class="custom-select">
        <option value="" disabled selected>Danh mục</option>
        @foreach($categories as $cat)
          <option value="{{ route('category.show', $cat->slug) }}">{{ $cat->name }}</option>
        @endforeach
      </select>
    </div>

    <form action="{{ route('news.search') }}" method="GET" class="w-full">
      <div class="group">
        <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">
          <g>
            <path
              d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z" />
          </g>
        </svg>
        <input type="text" name="keyword" placeholder="Tìm kiếm..." required class="input" />
      </div>
    </form>
  </div>



            {{-- Phải: Nút & Avatar --}}
            <div class="flex items-center gap-4">

                {{-- Nút burger --}}
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden p-2 text-gray-700 dark:text-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>

            {{-- Nút liên kết nhanh --}}
<div class="btn-group hidden md:flex gap-4">
    <a href="{{ route('news.suggested') }}" class="fancy-btn">Đề xuất</a>
    <a href="{{ route('news.latest') }}" class="fancy-btn">Mới nhất</a>
    <a href="{{ route('news.popular') }}" class="fancy-btn">Xem nhiều</a>
  </div>

  <style>
    .btn-group {
      /* flex container cho các nút */
      display: flex;
      gap: 1rem;
    }

    .fancy-btn {
      position: relative;
      display: flex;
      justify-content: center;
      align-items: center;
      width: 140px;
      height: 50px;
      background: #000;
      color: #fff;
      font-weight: bold;
      font-size: 17px;
      border: none;
      cursor: pointer;
      text-decoration: none; /* để link không gạch chân */
      z-index: 1;
      overflow: hidden;
      border-radius: 8px;
      user-select: none;
      transition: color 0.3s ease;
    }

    .fancy-btn::after,
    .fancy-btn::before {
      content: "";
      position: absolute;
      width: 100%;
      height: 10%;
      background: #8792eb;
      clip-path: polygon(
        0% 74%,
        4% 75%,
        8% 76%,
        11% 77%,
        15% 78%,
        20% 78%,
        25% 77%,
        32% 77%,
        37% 75%,
        40% 74%,
        43% 74%,
        46% 73%,
        52% 72%,
        57% 72%,
        65% 74%,
        66% 75%,
        71% 78%,
        75% 82%,
        81% 86%,
        83% 88%,
        88% 91%,
        90% 94%,
        94% 96%,
        98% 98%,
        100% 100%,
        82% 100%,
        0 100%
      );
      transition: 0.2s ease;
      z-index: -1;
    }
    .fancy-btn::after {
      bottom: 0;
    }
    .fancy-btn::before {
      top: 0;
      transform: rotate(180deg);
    }
    .fancy-btn:hover::after,
    .fancy-btn:hover::before {
      clip-path: polygon(
        0 30%,
        9% 34%,
        7% 39%,
        11% 43%,
        13% 33%,
        17% 30%,
        24% 34%,
        25% 35%,
        30% 31%,
        30% 38%,
        39% 33%,
        35% 43%,
        43% 45%,
        55% 46%,
        65% 74%,
        67% 66%,
        81% 57%,
        75% 82%,
        81% 86%,
        83% 88%,
        88% 91%,
        90% 94%,
        94% 96%,
        98% 98%,
        100% 100%,
        82% 100%,
        0 100%
      );
      height: 80%;
    }
    .fancy-btn:hover {
      color: #e0e0ff;
    }
  </style>


                {{-- Avatar hoặc Đăng nhập --}}
                <div class="avatar-container">
                    @auth
                      <div class="avatar-display" onclick="toggleAvatarMenu()">
                        <img
                          src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : asset('images/default-avatar.png') }}"
                          alt="Ảnh đại diện"
                          class="avatar-image"
                        />
                        <span class="avatar-name">{{ Auth::user()->name }}</span>
                      </div>
                      <div id="avatar-menu" class="avatar-menu hidden">
                        <a href="{{ route('profile') }}" class="avatar-menu-item">Trang cá nhân</a>
                        <form action="{{ route('logout') }}" method="POST" class="avatar-menu-item border-t">
                          @csrf
                          <button type="submit" class="logout-button">Đăng xuất</button>
                        </form>
                      </div>
                    @else
                      <a href="{{ route('login') }}" class="btn-login">Đăng nhập</a>
                      <a href="{{ route('register') }}" class="btn-register">Đăng ký</a>
                    @endauth
                  </div>

                  <style>.avatar-container {
                    position: relative;
                    background: #f0f0f0;
                    padding: 15px 25px;
                    display: flex;
                    align-items: center;
                    gap: 15px;
                    border: 4px solid #000;
                    max-width: 300px;
                    cursor: pointer;
                    transition: all 400ms cubic-bezier(0.23, 1, 0.32, 1);
                    transform-style: preserve-3d;
                    transform: rotateX(10deg) rotateY(-10deg);
                    perspective: 1000px;
                    box-shadow: 10px 10px 0 #000;
                    border-radius: 12px;
                  }

                  .avatar-container:hover {
                    transform: rotateX(5deg) rotateY(1deg) scale(1.05);
                    box-shadow: 25px 25px 0 -5px #e9b50b, 25px 25px 0 0 #000;
                  }

                  .avatar-display {
                    display: flex;
                    align-items: center;
                    gap: 15px;
                    transform: translateZ(10px);
                    position: relative;
                    z-index: 3;
                  }

                  .avatar-image {
                    width: 42px;
                    height: 42px;
                    border-radius: 50%;
                    border: 3px solid #000;
                    object-fit: cover;
                    box-shadow: 0 0 10px rgba(0,0,0,0.15);
                    transition: all 300ms ease;
                  }

                  .avatar-name {
                    font-weight: 700;
                    font-size: 1rem;
                    color: #000;
                    user-select: none;
                    text-transform: capitalize;
                    font-family: "Roboto", Arial, sans-serif;
                    letter-spacing: -0.5px;
                    transform: translateZ(10px);
                  }

                  .avatar-display:hover .avatar-image {
                    transform: scale(1.1);
                    box-shadow: 0 0 15px #e9b50b;
                  }

                  .avatar-menu {
                    position: absolute;
                    right: 0;
                    top: 110%;
                    background: #fff;
                    border: 2px solid #000;
                    border-radius: 10px;
                    width: 180px;
                    box-shadow: 8px 8px 0 #000;
                    z-index: 20;
                    transition: opacity 0.3s ease;
                  }

                  .avatar-menu.hidden {
                    display: none;
                  }

                  .avatar-menu-item {
                    display: block;
                    padding: 10px 15px;
                    color: #000;
                    font-weight: 600;
                    border-bottom: 1px solid #ddd;
                    text-decoration: none;
                    background-color: #fff;
                    transition: background-color 0.2s ease;
                  }

                  .avatar-menu-item:hover {
                    background-color: #f7d54b;
                  }

                  .avatar-menu-item.border-t {
                    border-top: 1px solid #ddd;
                  }

                  .logout-button {
                    width: 100%;
                    background: none;
                    border: none;
                    color: #d63636;
                    font-weight: 700;
                    cursor: pointer;
                    padding: 10px 15px;
                    text-align: left;
                  }

                  .btn-login,
                  .btn-register {
                    font-size: 0.9rem;
                    padding: 8px 14px;
                    border-radius: 8px;
                    text-decoration: none;
                    font-weight: 700;
                    user-select: none;
                  }

                  .btn-login {
                    border: 3px solid #000;
                    color: #000;
                    background: #f0f0f0;
                    transition: background-color 0.3s ease;
                  }

                  .btn-login:hover {
                    background-color: #e9b50b;
                    color: #000;
                  }

                  .btn-register {
                    background-color: #e9b50b;
                    color: #000;
                    border: 3px solid #000;
                    transition: background-color 0.3s ease;
                  }

                  .btn-register:hover {
                    background-color: #d4a700;
                    color: #000;
                  }
                  </style>

                  <script>function toggleAvatarMenu() {
                    const menu = document.getElementById('avatar-menu');
                    menu.classList.toggle('hidden');
                  }

                  // Ẩn menu khi click ra ngoài
                  window.addEventListener('click', function(e) {
                    const container = document.querySelector('.avatar-container');
                    const menu = document.getElementById('avatar-menu');
                    if (!container.contains(e.target)) {
                      menu.classList.add('hidden');
                    }
                  });
                  </script>

            </div>
        </div>

        <!-- Menu ẩn (dành cho di động) -->
        <div x-show="mobileMenuOpen" class="md:hidden bg-white dark:bg-gray-800 shadow-md">
            <div class="px-4 py-2">
                <a href="{{ route('news.suggested') }}" class="block px-3 py-2 text-gray-700 dark:text-gray-200">Đề xuất</a>
                <a href="{{ route('news.latest') }}" class="block px-3 py-2 text-gray-700 dark:text-gray-200">Mới nhất</a>
                <a href="{{ route('news.popular') }}" class="block px-3 py-2 text-gray-700 dark:text-gray-200">Xem nhiều</a>
            </div>
        </div>
    </nav>

    <!-- JavaScript xử lý menu avatar -->
    <script>
        function toggleAvatarMenu() {
            document.getElementById('avatar-menu').classList.toggle('hidden');
        }
    </script>

    <!-- Thư viện Alpine.js -->
    <script src="https://unpkg.com/alpinejs" defer></script>
</body>
</html>
