<section>
    <header>
        {{-- Tiêu đề và mô tả --}}
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            Đổi mật khẩu
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            Hãy sử dụng mật khẩu dài và ngẫu nhiên để bảo vệ tài khoản của bạn.
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        {{-- Mật khẩu hiện tại --}}
        <div>
            <x-input-label for="current_password" :value="__('Mật khẩu hiện tại')" />
            <x-text-input id="current_password"
                          name="current_password"
                          type="password"
                          class="mt-1 block w-full"
                          required
                          autocomplete="current-password" />
            <x-input-error class="mt-2" :messages="$errors->get('current_password')" />
        </div>

        {{-- Mật khẩu mới --}}
        <div>
            <x-input-label for="password" :value="__('Mật khẩu mới')" />
            <x-text-input id="password"
                          name="password"
                          type="password"
                          class="mt-1 block w-full"
                          required
                          autocomplete="new-password" />
            <x-input-error class="mt-2" :messages="$errors->get('password')" />
        </div>

        {{-- Xác nhận mật khẩu --}}
        <div>
            <x-input-label for="password_confirmation" :value="__('Xác nhận mật khẩu')" />
            <x-text-input id="password_confirmation"
                          name="password_confirmation"
                          type="password"
                          class="mt-1 block w-full"
                          required
                          autocomplete="new-password" />
            <x-input-error class="mt-2" :messages="$errors->get('password_confirmation')" />
        </div>

        {{-- Nút lưu --}}
        <div class="flex items-center gap-4">
            <x-primary-button>
                Lưu mật khẩu
            </x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >
                    Mật khẩu đã được cập nhật.
                </p>
            @endif
        </div>
    </form>
</section>
