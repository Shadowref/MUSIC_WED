<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Hiển thị trang chủ với bài viết nổi bật, mới nhất, bài viết xem nhiều, bình luận mới và danh mục.
     */
    public function index()
    {
        // Bài viết nổi bật
        $featuredNews = News::where('is_featured', true)->latest()->take(3)->get();

        // Tin mới nhất
        $latestNews = News::latest()->take(6)->get();

        // Tin xem nhiều nhất
        $popularNews = News::orderBy('views', 'desc')->take(6)->get();

        // Bình luận mới nhất
        $recentComments = Comment::latest()->take(5)->with('user')->get();

        // Danh mục
        $categories = Category::all();

        // Bài viết đề xuất (ví dụ: lấy ngẫu nhiên)
        $recommendedNews = News::inRandomOrder()->take(6)->get();

        return view('home', compact(
            'featuredNews',
            'latestNews',
            'popularNews',
            'recentComments',
            'categories',
            'recommendedNews' // Thêm biến này vào view
        ));
    }

    /**
     * Hiển thị bài viết theo danh mục.
     */
    public function show($slug)
    {
        // Tìm danh mục theo slug
        $category = Category::where('slug', $slug)->firstOrFail();

        // Tất cả danh mục để hiển thị sidebar/menu
        $categories = Category::all();

        // Các bài viết thuộc danh mục đó
        $newsItems = News::where('category_id', $category->id)
                         ->latest()
                         ->paginate(9);

        return view('category.show', compact(
            'category',
            'categories',
            'newsItems'
        ));
    }

    public function userDashboard()
    {
        return view('dashboard'); // dashboard.blade.php dành cho user
    }
}
