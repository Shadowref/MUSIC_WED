<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    // Hiển thị danh sách bình luận
    public function index()
    {
        $comments = Comment::paginate(10); // Hoặc số bản ghi mỗi trang bạn muốn
        return view('admin.comments.index', compact('comments'));
    }


    // Hiển thị form sửa bình luận
    public function edit($id)
    {
        $comment = Comment::findOrFail($id);
        return view('admin.comments.edit', compact('comment'));
    }

    // Xử lý cập nhật bình luận
    public function update(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);
        $comment->content = $request->content;
        $comment->save();

        return redirect()->route('admin.comments.index')->with('success', 'Bình luận đã được cập nhật.');
    }

    // Xóa bình luận
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return redirect()->route('admin.comments.index')->with('success', 'Bình luận đã được xóa.');
    }
}

