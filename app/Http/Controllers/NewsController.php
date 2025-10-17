<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Hiển thị chi tiết một bài viết.
     */
    public function show(string $slug)
    {
        // Lấy bài viết theo slug hoặc 404 nếu không tồn tại
        $news = News::where('slug', $slug)->firstOrFail();

        // Tăng lượt xem
        $news->increment('views');

        // Lấy tất cả danh mục (Collection, không bao giờ null)
        $categories = Category::all();

        // Lấy bình luận kèm thông tin người dùng, mới nhất, phân trang
        $comments = $news->comments()->with('user')->latest()->paginate(5);

        return view('news.show', compact('news', 'categories', 'comments'));
    }

    /**
     * Xử lý tìm kiếm bài viết.
     */
    public function search(Request $request)
    {
        // Lấy từ khóa, ép kiểu string để an toàn
        $keyword = (string) $request->input('keyword', '');

        // Nếu không có từ khóa, trả về kết quả tìm kiếm không có bài viết
        if (!$keyword) {
            $news = News::paginate(12); // Hiển thị tất cả bài viết
        } else {
            // Tìm trong title, summary, content
            $news = News::query()
                ->where(function ($query) use ($keyword) {
                    $query->where('title', 'like', "%{$keyword}%")
                          ->orWhere('summary', 'like', "%{$keyword}%")
                          ->orWhere('content', 'like', "%{$keyword}%");
                })
                ->paginate(12) // Phân trang nếu cần
                ->appends(['keyword' => $keyword]);
        }

        // Lấy tất cả danh mục
        $categories = Category::all();

        return view('news.search', compact('news', 'categories'));
    }

    /**
     * Hiển thị danh sách các bài viết.
     */
    public function index()
    {
        $news = News::latest()->paginate(10); // Hiển thị 10 bài viết mỗi trang
        return view('news.index', compact('news'));
    }

public function suggested()
{
    // Bước 1: Lấy top 30 bài viết mới nhất, lượt xem cao nhất
    $topNews = News::orderBy('created_at', 'desc')
                   ->orderBy('views', 'desc')
                   ->take(30)
                   ->get();

    // Bước 2: Lấy ngẫu nhiên 9 bài trong tập 30 bài trên
    $news = $topNews->random(min(9, $topNews->count()));

    return view('news.suggested', compact('news'));
}



public function latest()
{
    // Lấy 9 bài viết mới nhất theo ngày đăng (mới nhất đầu tiên)
    $news = News::orderBy('created_at', 'desc')
                ->take(9)
                ->get();

    // Truyền biến $news vào view
    return view('news.latest', compact('news'));
}



    public function mostViewed()
    {
        // Lấy 9 bài viết có lượt xem cao nhất
        $news = News::orderBy('views', 'desc')
                    ->take(9)
                    ->get();

        // Truyền biến $news vào view
        return view('news.popular', compact('news'));
    }



}
