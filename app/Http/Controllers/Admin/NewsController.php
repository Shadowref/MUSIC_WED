<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::with('category')->latest()->paginate(10);
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.news.create', compact('categories'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'video' => 'nullable|mimes:mp4,avi,mkv|max:102400',
            'audio' => 'nullable|mimes:mp3,wav,flac|max:102400',
            'views' => 'nullable|integer|min:0',
        ]);

        $news = new News();
        $news->title = $validated['title'];
        $news->slug = Str::slug($validated['title']);
        $news->content = $validated['content'];
        $news->category_id = $validated['category_id'];
        $news->summary = $request->input('summary', '');
        $news->views = $validated['views'] ?? 0;

        // Lưu ảnh
        if ($request->hasFile('image')) {
            $news->image = $request->file('image')->store('images', 'public');
        }

        // Lưu video
        if ($request->hasFile('video')) {
            $news->video_url = $request->file('video')->store('videos', 'public');
        }

        // Lưu audio
        if ($request->hasFile('audio')) {
            $news->audio_url = $request->file('audio')->store('audio', 'public');
        }

        $news->save();

        return redirect()->route('admin.news.index')->with('success', 'Bài viết đã được thêm!');
    }


    public function edit(News $news)
    {
        $categories = Category::all();
        return view('admin.news.edit', compact('news','categories'));
    }

    public function update(Request $request, News $news)
    {
        // Validate dữ liệu
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:2048',
            'audio' => 'nullable|mimes:mp3,wav|max:102400',
            'video' => 'nullable|mimes:mp4,avi,mkv|max:102400',
            'summary' => 'nullable|string',
            'content' => 'nullable|string',
            'views' => 'nullable|integer|min:0',

        ]);

        // Cập nhật thông tin cơ bản
        $news->title = $request->input('title');
        $news->slug = $request->input('slug');
        $news->category_id = $request->input('category_id');
        $news->summary = $request->input('summary', ''); // Đảm bảo có giá trị cho 'summary'
        $news->content = $request->input('content');
        $news->views = $request->input('views', $news->views); // Cập nhật lượt xem nếu có

        // Cập nhật các tệp tin nếu có
        if ($request->hasFile('image')) {
            // Xóa ảnh cũ nếu có
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }
            $news->image = $request->file('image')->store('images', 'public');
        }

        if ($request->hasFile('audio')) {
            // Xóa audio cũ nếu có
            if ($news->audio) {
                Storage::disk('public')->delete($news->audio);
            }
            $news->audio = $request->file('audio')->store('audio', 'public');
        }

        if ($request->hasFile('video')) {
            // Xóa video cũ nếu có
            if ($news->video) {
                Storage::disk('public')->delete($news->video);
            }
            $news->video = $request->file('video')->store('videos', 'public');
        }

        // Lưu tin tức đã cập nhật
        $news->save();

        // Quay lại trang quản lý tin tức sau khi cập nhật thành công
        return redirect()->route('admin.news.index')->with('success', 'Tin tức đã được cập nhật.');
    }

    public function destroy(News $news)
    {
        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }
        $news->delete();
        return back()->with('success', 'Tin tức đã được xoá.');
    }
}
