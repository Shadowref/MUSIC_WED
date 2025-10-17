@extends('layouts.admin')

{{-- Tiêu đề hiển thị trên tab trình duyệt --}}
@section('title', 'Sửa Loại tin')

@section('content')
    {{-- Tiêu đề lớn trong nội dung trang --}}
    <h2 class="text-2xl font-semibold mb-4">Sửa Loại tin</h2>

    {{-- Hiển thị lỗi nếu có --}}
    @if($errors->any())
        <div class="mb-4">
            <ul class="list-disc list-inside text-red-600">
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form cập nhật loại tin --}}
    <form action="{{ route('admin.categories.update', $category->id) }}"
          method="POST"
          enctype="multipart/form-data"
          class="space-y-4">

        @csrf
        @method('PUT')

        {{-- Trường nhập tên loại tin --}}
        <div>
            <label class="block mb-1 font-medium">Tên loại tin</label>
            <input type="text" name="name"
                   value="{{ old('name', $category->name) }}"
                   required
                   class="w-full border p-2 rounded">
        </div>

        {{-- Trường nhập slug --}}
        <div>
            <label class="block mb-1 font-medium">Slug (đường dẫn)</label>
            <input type="text" name="slug"
                   value="{{ old('slug', $category->slug) }}"
                   required
                   class="w-full border p-2 rounded">
        </div>

        {{-- Ảnh hiện tại (nếu có) --}}
        <div>
            <label class="block mb-1 font-medium">Ảnh hiện tại</label>
            @if($category->image)
                <img src="{{ asset('storage/' . $category->image) }}"
                     alt="Ảnh loại tin"
                     class="w-24 h-24 object-cover rounded">
            @else
                <p class="text-gray-500 italic">Chưa có ảnh</p>
            @endif
        </div>

        {{-- Upload ảnh mới --}}
        <div>
            <label class="block mb-1 font-medium">Ảnh mới</label>
            <input type="file" name="image"
                   class="w-full border p-2 rounded bg-white
                          file:mr-4 file:py-2 file:px-4
                          file:rounded file:border-0
                          file:text-sm file:font-semibold
                          file:bg-blue-50 file:text-blue-700
                          hover:file:bg-blue-100">
        </div>

        {{-- Nút cập nhật --}}
        <button type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Cập nhật
        </button>
    </form>
@endsection
