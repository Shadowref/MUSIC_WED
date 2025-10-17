<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all(); // Lấy tất cả tin tức
        return response()->json($news); // Trả về dữ liệu dưới dạng JSON
    }

    public function show($slug)
    {
        $news = News::where('slug', $slug)->firstOrFail();
        return response()->json($news); // Trả về dữ liệu chi tiết tin tức
    }
}
