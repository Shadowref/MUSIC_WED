<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function __construct()
    {
        // Yêu cầu người dùng phải đăng nhập
        $this->middleware('auth');
    }

    /**
     * Lưu bình luận mới
     */
    public function store(Request $request, $slug)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $news = News::where('slug', $slug)->firstOrFail();

        $news->comments()->create([
            'user_id' => Auth::id(),
            'content' => $request->input('content'),
        ]);

        return redirect()->route('news.show', $slug)
                         ->with('success', 'Bình luận đã được gửi!');
    }

    /**
     * Cập nhật bình luận
     */
    public function update(Request $request, Comment $comment)
    {
        if ($comment->user_id !== Auth::id()) {
            abort(403, 'Bạn không có quyền sửa bình luận này.');
        }

        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $comment->update([
            'content' => $request->input('content'),
        ]);

        return back()->with('success', 'Đã cập nhật bình luận.');
    }

    /**
     * Xóa bình luận
     */
    public function destroy(Comment $comment)
    {
        // Chỉ cho phép chủ bình luận xóa bình luận của mình
        if ($comment->user_id !== Auth::id()) {
            abort(403, 'Bạn không có quyền xóa bình luận này.');
        }

        $comment->delete();

        return back()->with('success', 'Đã xóa bình luận.');
    }

}
