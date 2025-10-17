<?php

namespace App\Http\Controllers\Admin; // hoặc App\Http\Controllers

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    // Hiển thị danh sách loại tin
    public function index()
    {
        // Lấy phân trang 10 bản ghi / trang
        $categories = Category::latest()->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    // Form tạo mới
    public function create()
    {
        return view('admin.categories.create');
    }

    // Lưu loại tin mới
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|max:255',
            'slug'  => 'required|unique:categories,slug',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('categories', 'public');
        }

        Category::create([
            'name'  => $request->name,
            'slug'  => $request->slug,
            'image' => $imagePath,
        ]);

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Thêm loại tin thành công.');
    }

    // Form chỉnh sửa
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    // Cập nhật loại tin
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name'  => 'required|max:255',
            'slug'  => 'required|unique:categories,slug,'.$category->id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Xóa ảnh cũ nếu có và upload ảnh mới
        if ($request->hasFile('image')) {
            if ($category->image) {
                Storage::disk('public')->delete($category->image);
            }
            $category->image = $request->file('image')->store('categories', 'public');
        }

        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->save();

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Cập nhật loại tin thành công.');
    }

    // Xóa loại tin
    public function destroy(Category $category)
    {
        // Xóa ảnh kèm theo nếu có
        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        }

        $category->delete();

        return back()->with('success', 'Đã xóa loại tin.');
    }

    // Hiển thị danh sách bài viết theo loại (frontend)
    public function show($slug)
    {
        $category  = Category::where('slug', $slug)->firstOrFail();
        $newsItems = $category->news()->latest()->paginate(10);

        return view('category.show', compact('category', 'newsItems'));
    }
}
