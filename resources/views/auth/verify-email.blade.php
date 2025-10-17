<x-guest-layout>
    <!-- Container chính căn giữa, bo góc, đổ bóng, nền trắng (hoặc xám trong dark mode) -->
    <div class="max-w-md mx-auto mt-10 p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md text-center">

        <!-- Phần biểu tượng và tiêu đề xác minh -->
        <div class="mb-4">
            <!-- Biểu tượng mũi tên xác minh -->
            <svg class="mx-auto w-12 h-12 text-indigo-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16 12H8m0 0l4-4m-4 4l4 4m8-12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>

            <!-- Tiêu đề -->
            <h2 class="text-lg font-semibold mt-2 text-gray-800 dark:text-gray-100">
                Xác minh email của bạn
            </h2>
        </div>

        <!-- Nội dung hướng dẫn xác minh -->
        <p class="mb-4 text-sm text-gray-600 dark:text-gray-400">
            Cảm ơn bạn đã đăng ký tài khoản! <br>
            Trước khi bắt đầu sử dụng, vui lòng xác minh địa chỉ email của bạn bằng cách nhấp vào liên kết chúng tôi đã gửi qua email. <br>
            Nếu bạn chưa nhận được, bạn có thể yêu cầu gửi lại liên kết xác minh.
        </p>

        <!-- Thông báo khi đã gửi lại liên kết xác minh thành công -->
        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 text-sm font-medium text-green-600 dark:text-green-400">
                Một liên kết xác minh mới đã được gửi đến địa chỉ email của bạn.
            </div>
        @endif

        <!-- Nhóm nút: gửi lại xác minh và đăng xuất -->
        <div class="mt-6 flex flex-col sm:flex-row items-center justify-center gap-4">
            <!-- Form gửi lại email xác minh -->
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <x-primary-button class="w-full sm:w-auto">
                    Gửi lại email
                </x-primary-button>
            </form>

            <!-- Form đăng xuất khỏi tài khoản -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="w-full sm:w-auto inline-flex items-center justify-center px-4 py-2 bg-transparent text-sm text-gray-700 dark:text-gray-300 hover:text-red-600 dark:hover:text-red-400 underline focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800 rounded-md">
                    Đăng xuất
                </button>
            </form>
        </div>
    </div>
</x-guest-layout>
