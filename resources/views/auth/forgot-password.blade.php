<!-- Sử dụng layout dành cho khách (chưa đăng nhập) -->
<x-guest-layout>

    <!-- Thông báo hướng dẫn người dùng nhập email để lấy lại mật khẩu -->
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Quên mật khẩu? Không sao cả. Hãy cung cấp địa chỉ email của bạn, chúng tôi sẽ gửi cho bạn một liên kết đặt lại mật khẩu.') }}
        <!-- Dòng này sử dụng đa ngôn ngữ Laravel (__()) để hiển thị nội dung, đã được việt hóa -->
    </div>

    <!-- Hiển thị trạng thái của phiên làm việc (ví dụ: "Liên kết đặt lại mật khẩu đã được gửi") -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Form gửi email để yêu cầu đặt lại mật khẩu -->
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <!-- CSRF Token để bảo vệ form khỏi các cuộc tấn công giả mạo -->

        <!-- Nhập địa chỉ email -->
        <div>
            <!-- Nhãn cho trường email -->
            <x-input-label for="email" :value="__('Email')" />

            <!-- Trường nhập email -->
            <x-text-input id="email"
                          class="block mt-1 w-full"
                          type="email"
                          name="email"
                          :value="old('email')"
                          required
                          autofocus />
            <!-- :value="old('email')": giữ lại giá trị email đã nhập nếu form bị trả lại do lỗi -->
            <!-- autofocus: tự động đặt con trỏ vào trường này khi tải trang -->

            <!-- Hiển thị lỗi nếu có lỗi nhập email -->
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Nút gửi yêu cầu -->
        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Gửi liên kết đặt lại mật khẩu') }}
                <!-- Dòng này là nội dung nút, đã được việt hóa -->
            </x-primary-button>
        </div>
    </form>

</x-guest-layout>
