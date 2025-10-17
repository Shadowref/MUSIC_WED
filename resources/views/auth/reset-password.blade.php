<!-- Giao diện layout dành cho người chưa đăng nhập -->
<x-guest-layout>

    <!-- Form Đặt lại mật khẩu -->
    <form method="POST" action="{{ route('password.store') }}">
        @csrf
        <!-- Bảo vệ chống tấn công CSRF -->

        <!-- Token reset mật khẩu (ẩn) -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Địa chỉ Email -->
        <div>
            <x-input-label for="email" :value="__('Địa chỉ Email')" />
            <x-text-input id="email"
                          class="block mt-1 w-full"
                          type="email"
                          name="email"
                          :value="old('email', $request->email)"
                          required
                          autofocus
                          autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Mật khẩu mới -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Mật khẩu mới')" />
            <x-text-input id="password"
                          class="block mt-1 w-full"
                          type="password"
                          name="password"
                          required
                          autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Xác nhận mật khẩu mới -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Xác nhận mật khẩu mới')" />
            <x-text-input id="password_confirmation"
                          class="block mt-1 w-full"
                          type="password"
                          name="password_confirmation"
                          required
                          autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Nút gửi form -->
        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Đặt lại mật khẩu') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
