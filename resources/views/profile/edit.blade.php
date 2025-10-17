@extends('layouts.app')

@section('title', 'Hồ sơ cá nhân')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

        {{-- 1. Phần cập nhật thông tin cá nhân --}}
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        {{-- 2. Phần cập nhật mật khẩu --}}
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        {{-- 3. Phần xóa tài khoản --}}
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>

        {{-- 4. Phần tải lên ảnh đại diện --}}
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="max-w-xl">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Cập nhật ảnh đại diện</h3>

                {{-- Form tải ảnh đại diện --}}
                <form action="{{ route('profile.avatar') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf

                    {{-- Khung chứa avatar, có id để JS gắn sự kiện --}}
                    <div id="avatar-container" class="flex items-center space-x-4 cursor-pointer">
                        @if ($user->avatar)
                            <img id="avatar-preview"
                                 src="{{ asset('storage/' . $user->avatar) }}"
                                 alt="Ảnh đại diện hiện tại"
                                 class="h-20 w-20 rounded-full object-cover border" />
                        @else
                            <img id="avatar-preview"
                                 src="{{ asset('images/default-avatar.png') }}"
                                 alt="Ảnh đại diện mặc định"
                                 class="h-20 w-20 rounded-full object-cover border" />
                        @endif

                        {{-- Input file ẩn, chỉ JS trigger được --}}
                        <input type="file"
                               name="avatar"
                               id="avatar-input"
                               accept="image/*"
                               class="hidden" />
                    </div>

                    <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                        Lưu ảnh mới
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    // Lấy các phần tử DOM
    const container = document.getElementById('avatar-container');
    const input = document.getElementById('avatar-input');
    const preview = document.getElementById('avatar-preview');

    if (!container || !input || !preview) return;

    // Khi click vào khung avatar, mở hộp thoại chọn file
    container.addEventListener('click', () => {
        input.click();
    });

    // Khi người dùng chọn ảnh mới
    input.addEventListener('change', () => {
        const file = input.files[0];
        if (!file) return;

        // Hiển thị ngay ảnh xem trước
        preview.src = URL.createObjectURL(file);
        // Nếu muốn tự động gửi form khi chọn xong, bỏ comment dòng bên dưới:
        // container.closest('form').submit();
    });
});
</script>
@endpush
