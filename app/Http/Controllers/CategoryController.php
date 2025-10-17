<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Hiển thị tất cả các loại tin
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    // Hiển thị form để tạo mới loại tin
    public function create()
    {
        return view('categories.create');
    }

    // Lưu thông tin loại tin mới vào cơ sở dữ liệu
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|unique:categories,slug',
        ]);

        Category::create($request->all());
        return redirect()->route('categories.index')->with('success', 'Thêm loại tin thành công');
    }

    // Hiển thị form để chỉnh sửa loại tin
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    // Cập nhật thông tin loại tin
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|unique:categories,slug,' . $category->id,
        ]);

        $category->update($request->only('name', 'slug'));
        return redirect()->route('categories.index')->with('success', 'Cập nhật loại tin thành công');
    }

    // Xóa loại tin
    public function destroy(Category $category)
    {
        $category->delete();
        return back()->with('success', 'Đã xóa loại tin');
    }

    // Phương thức show để hiển thị các tin theo loại
    public function show($slug)
    {
        // Lấy danh mục theo slug
        $category = Category::where('slug', $slug)->firstOrFail();

        // Lấy tất cả bài viết thuộc danh mục này, phân trang
        $newsItems = $category->news()->paginate(10);  // Hoặc điều chỉnh số lượng tùy ý

        // Trả về view với biến $category và $newsItems
        return view('category.show', compact('category', 'newsItems'));
    }

}
