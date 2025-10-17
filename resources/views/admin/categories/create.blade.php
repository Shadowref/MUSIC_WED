@extends('layouts.admin')

{{-- Tiêu đề trang --}}
@section('title', 'Thêm Loại tin')

@section('content')
    {{-- Tiêu đề nội dung --}}
    <h2 class="text-2xl font-semibold mb-4">Thêm Loại tin mới</h2>

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

    {{-- Form thêm mới loại tin --}}
    <form action="{{ route('admin.categories.store') }}"
          method="POST"
          enctype="multipart/form-data"
          class="space-y-4">

        @csrf

        {{-- Nhập tên loại tin --}}
        <div>
            <label class="block mb-1 font-medium">Tên loại tin</label>
            <input type="text" name="name"
                   value="{{ old('name') }}"
                   required
                   class="w-full border p-2 rounded">
        </div>

        {{-- Nhập slug (tên không dấu, dùng cho đường dẫn URL) --}}
        <div>
            <label class="block mb-1 font-medium">Slug (đường dẫn)</label>
            <input type="text" name="slug"
                   value="{{ old('slug') }}"
                   required
                   class="w-full border p-2 rounded">
        </div>

        {{-- Upload ảnh đại diện --}}
        <div>
            <label class="block mb-1 font-medium">Ảnh đại diện</label>
            <input type="file" name="image"
                   class="w-full border p-2 rounded bg-white
                          file:mr-4 file:py-2 file:px-4
                          file:rounded file:border-0
                          file:text-sm file:font-semibold
                          file:bg-blue-50 file:text-blue-700
                          hover:file:bg-blue-100">
        </div>

        {{-- Nút gửi form --}}
        <button type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Lưu
        </button>
    </form>
@endsection
