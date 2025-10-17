<?php

// app/Http/Controllers/Admin/DashboardController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Category;
use App\Models\News;
use App\Models\Comment;

class DashboardController extends Controller
{
    public function index()
    {
        // Lấy số lượng các đối tượng cần quản lý
        $usersCount = User::count();
        $categoriesCount = Category::count();
        $newsCount = News::count();
        $commentsCount = Comment::count();
        $newsViewsCount = News::sum('views');

        return view('admin.dashboard', compact(
            'usersCount', 'categoriesCount', 'newsCount', 'commentsCount', 'newsViewsCount'
        ));
    }
}

