<x-guest-layout>

    <!-- Tiêu đề trang -->
    <h2 class="text-2xl font-semibold text-center text-gray-800 dark:text-gray-100 mb-6">
        Đăng nhập tài khoản
    </h2>

    <!-- Trạng thái phiên (nếu có) -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Form Đăng nhập -->
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Địa chỉ Email -->
        <div>
            <x-input-label for="email" :value="__('Địa chỉ Email')" />
            <x-text-input id="email"
                          class="block mt-1 w-full"
                          type="email"
                          name="email"
                          :value="old('email')"
                          required
                          autofocus
                          autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Mật khẩu -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Mật khẩu')" />
            <x-text-input id="password"
                          class="block mt-1 w-full"
                          type="password"
                          name="password"
                          required
                          autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Ghi nhớ đăng nhập -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me"
                       type="checkbox"
                       class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                       name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">
                    Ghi nhớ đăng nhập
                </span>
            </label>
        </div>

        <!-- Liên kết Quên mật khẩu & Nút đăng nhập -->
        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                   href="{{ route('password.request') }}">
                    Quên mật khẩu?
                </a>
            @endif

            <x-primary-button class="ms-3">
                Đăng nhập
            </x-primary-button>
        </div>
    </form>

</x-guest-layout>
