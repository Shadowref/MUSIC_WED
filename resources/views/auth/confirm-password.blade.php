<!-- Giao diện bố cục dành cho khách (người dùng chưa đăng nhập hoặc chưa xác nhận hành động) -->
<x-guest-layout>

    <!-- Thông báo yêu cầu xác nhận mật khẩu trước khi tiếp tục -->
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        Đây là khu vực bảo mật của ứng dụng. Vui lòng xác nhận mật khẩu của bạn trước khi tiếp tục.
        <!-- Thông báo này dùng để cảnh báo người dùng rằng họ sắp thực hiện hành động quan trọng -->
    </div>

    <!-- Form gửi yêu cầu xác nhận mật khẩu -->
    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf
        <!-- Bảo vệ biểu mẫu khỏi tấn công CSRF -->

        <!-- Trường nhập mật khẩu -->
        <div>
            <!-- Nhãn (label) cho trường mật khẩu -->
            <x-input-label for="password" :value="'Mật khẩu'" />

            <!-- Ô nhập mật khẩu -->
            <x-text-input id="password" class="block mt-1 w-full"
                          type="password"
                          name="password"
                          required
                          autocomplete="current-password" />
            <!--
                type="password": giúp che ký tự khi người dùng nhập
                autocomplete="current-password": hỗ trợ trình duyệt điền mật khẩu hiện tại nếu đã lưu
            -->

            <!-- Hiển thị thông báo lỗi nếu người dùng nhập sai -->
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Khu vực chứa nút xác nhận -->
        <div class="flex justify-end mt-4">
            <x-primary-button>
                Xác nhận
                <!-- Nút gửi yêu cầu xác nhận mật khẩu -->
            </x-primary-button>
        </div>
    </form>

</x-guest-layout>
