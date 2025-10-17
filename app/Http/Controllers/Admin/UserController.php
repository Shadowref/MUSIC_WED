<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Hiển thị danh sách người dùng.
     */
    public function index()
    {
        // Hiển thị danh sách người dùng với phân trang
        $users = User::paginate(10); // 10 người dùng mỗi trang
        return view('admin.users.index', compact('users'));
    }

    /**
     * Hiển thị form chỉnh sửa người dùng.
     */
    public function edit(User $user)
    {
        // Sửa thông tin người dùng
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Xử lý cập nhật thông tin người dùng.
     */
    public function update(Request $request, User $user)
    {
        // Kiểm tra và validate dữ liệu đầu vào
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'role' => 'required|in:user,admin' // thêm dòng này // Kiểm tra avatar là hình ảnh hợp lệ

        ]);

        // Lấy dữ liệu cần cập nhật từ request
        $data = $request->only('name', 'email', 'role'); // thêm 'role' ở đây

        // Kiểm tra xem có file avatar mới không
        if ($request->hasFile('avatar')) {
            // Xóa avatar cũ nếu có
            if ($user->avatar && Storage::exists('public/' . $user->avatar)) {
                Storage::delete('public/' . $user->avatar);
            }

            // Lưu avatar mới và lưu đường dẫn vào cơ sở dữ liệu
            $path = $request->file('avatar')->store('avatars', 'public');
            $data['avatar'] = $path;
        }

        // Cập nhật thông tin người dùng
        $user->update($data);

        return redirect()->route('admin.users.index')->with('success', 'Cập nhật người dùng thành công');
    }

    /**
     * Xóa người dùng (không được xóa chính mình).
     */
    public function destroy(User $user)
    {
        // Chặn nếu chưa đăng nhập
        if (! Auth::check()) {
            return back()->with('error', 'Bạn cần đăng nhập để thực hiện hành động này.');
        }

        // Chặn xóa chính mình
        if (Auth::id() === $user->id) {
            return back()->with('error', 'Bạn không thể xóa chính mình.');
        }

        // Xóa người dùng khỏi cơ sở dữ liệu
        $user->delete();

        return back()->with('success', 'Đã xóa người dùng.');
    }

    public function store(Request $request)
{
    // Validate dữ liệu
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8|confirmed',
        'role' => 'required|in:user,admin',
    ]);

    // Tạo người dùng mới
    $user = new User();
    $user->name = $validated['name'];
    $user->email = $validated['email'];
    $user->password = Hash::make($validated['password']); // Mã hóa mật khẩu
    $user->role = $validated['role'];
    $user->save();

    return redirect()->route('admin.users.index')->with('success', 'Người dùng đã được tạo!');
}

public function create()
{
    return view('admin.users.create');
}



}
