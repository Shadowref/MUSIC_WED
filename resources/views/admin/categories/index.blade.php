@extends('layouts.admin')

@section('title', 'Quản lý Loại tin')

@section('page_title', 'Danh sách Loại tin')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="flex items-center gap-3 text-5xl font-extrabold text-indigo-900 whitespace-nowrap">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-indigo-700 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h7l5 5v9a2 2 0 01-2 2z" />
      </svg>
      <span>Danh sách loại tin</span>
    </h2>

    <a href="{{ route('admin.categories.create') }}"
       class="bg-blue-600 text-white px-5 py-3 rounded-lg hover:bg-blue-700 transition duration-300 font-semibold shadow-md whitespace-nowrap">
      + Thêm mới
    </a>
</div>

@if(session('success'))
    <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
        {{ session('success') }}
    </div>
@endif

<table class="w-full bg-white rounded shadow">
    <thead class="bg-gray-200 text-gray-700">
        <tr>
            <th class="px-4 py-2">STT</th> {{-- Cột số thứ tự --}}
            <th class="px-4 py-2">Tên</th>
            <th class="px-4 py-2">Slug</th>
            <th class="px-4 py-2">Ảnh</th>
            <th class="px-4 py-2">Ngày tạo</th>
            <th class="px-4 py-2">Ngày cập nhật</th>
            <th class="px-4 py-2">Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
            <tr class="border-b">
                <td class="px-4 py-2">{{ $loop->iteration }}</td> {{-- Hiển thị số thứ tự --}}
                <td class="px-4 py-2">{{ $category->name }}</td>
                <td class="px-4 py-2">{{ $category->slug }}</td>
                <td class="px-4 py-2">
                    @if($category->image)
                        <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" class="w-8 h-8 object-cover rounded">
                    @else
                        <span class="text-gray-500">Chưa có ảnh</span>
                    @endif
                </td>
                <td class="px-4 py-2">{{ $category->created_at->format('d/m/Y H:i') }}</td>
                <td class="px-4 py-2">{{ $category->updated_at->format('d/m/Y H:i') }}</td>
                <td class="px-4 py-2 space-x-2">
                    <a href="{{ route('admin.categories.edit', $category) }}" class="text-blue-600 hover:underline">Sửa</a> |
                    <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="inline" onsubmit="return confirm('Bạn chắc chắn muốn xóa?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Xóa</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
