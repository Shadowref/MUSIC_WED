<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Hiển thị biểu mẫu hồ sơ người dùng.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }


    /**
     * Cập nhật thông tin hồ sơ người dùng.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // Điền thông tin hồ sơ được cập nhật
        $request->user()->fill($request->validated());

        // Nếu email thay đổi, đánh dấu nó là chưa được xác minh
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        // Lưu thông tin người dùng đã cập nhật
        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Cập nhật ảnh đại diện của người dùng.
     */
    public function updateAvatar(Request $request): RedirectResponse
    {
        // Kiểm tra file ảnh đại diện
        $request->validate([
            'avatar' => 'required|image|max:2048', // Chỉ nhận ảnh và kích thước tối đa 2MB
        ]);

        // Kiểm tra xem có ảnh đại diện cũ cần xóa không
        $user = $request->user();
        if ($user->avatar) {
            // Xóa ảnh đại diện cũ khỏi bộ nhớ
            Storage::disk('public')->delete($user->avatar);
        }

        // Lưu ảnh đại diện mới vào thư mục 'avatars' trên đĩa công cộng
        $path = $request->file('avatar')->store('avatars', 'public');

        // Cập nhật ảnh đại diện của người dùng trong cơ sở dữ liệu
        $user->avatar = $path;
        $user->save();

        // Trở lại trang chỉnh sửa hồ sơ với thông báo thành công
        return Redirect::route('profile.edit')->with('status','Avatar đã được cập nhật');
    }

    /**
     * Xóa tài khoản người dùng.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Kiểm tra mật khẩu khi yêu cầu xóa tài khoản
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        // Đăng xuất người dùng
        Auth::logout();

        // Xóa người dùng
        $user->delete();

        // Hủy phiên làm việc và tái tạo token CSRF
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
