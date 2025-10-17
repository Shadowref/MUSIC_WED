<!-- Giao diện layout cho người dùng chưa đăng nhập -->
<x-guest-layout>

    <!-- Tiêu đề trang -->
    <h2 class="text-2xl font-semibold text-center text-gray-800 dark:text-gray-100 mb-6">
        Đăng ký tài khoản
    </h2>

    <!-- Form Đăng ký -->
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <!-- Mã xác thực CSRF để bảo vệ form -->

        <!-- Họ và Tên -->
        <div>
            <!-- Nhãn ô nhập tên -->
            <x-input-label for="name" :value="'Họ và tên'" />

            <!-- Ô nhập tên -->
            <x-text-input id="name"
                          class="block mt-1 w-full"
                          type="text"
                          name="name"
                          :value="old('name')"
                          required
                          autofocus
                          autocomplete="name" />

            <!-- Hiển thị lỗi (nếu có) -->
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Địa chỉ Email -->
        <div class="mt-4">
            <x-input-label for="email" :value="'Địa chỉ Email'" />

            <x-text-input id="email"
                          class="block mt-1 w-full"
                          type="email"
                          name="email"
                          :value="old('email')"
                          required
                          autocomplete="username" />

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Mật khẩu -->
        <div class="mt-4">
            <x-input-label for="password" :value="'Mật khẩu'" />

            <x-text-input id="password"
                          class="block mt-1 w-full"
                          type="password"
                          name="password"
                          required
                          autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Xác nhận mật khẩu -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="'Xác nhận mật khẩu'" />

            <x-text-input id="password_confirmation"
                          class="block mt-1 w-full"
                          type="password"
                          name="password_confirmation"
                          required
                          autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Liên kết chuyển đến đăng nhập và nút Đăng ký -->
        <div class="flex items-center justify-end mt-4">
            <!-- Nếu người dùng đã có tài khoản -->
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
               href="{{ route('login') }}">
                Đã có tài khoản? Đăng nhập
            </a>

            <!-- Nút đăng ký -->
            <x-primary-button class="ms-4">
                Đăng ký
            </x-primary-button>
        </div>
    </form>

</x-guest-layout>
