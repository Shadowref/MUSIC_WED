@extends('layouts.admin')

@section('title', 'Quản lý Tin tức')
@section('page_title', 'Quản lý Tin tức')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-8">
  <div class="flex justify-between items-center mb-8">
    <h2 class="text-4xl font-extrabold text-indigo-800 flex items-center gap-2">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-9 w-9 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h7l5 5v9a2 2 0 01-2 2z" />
      </svg>
      Danh sách Tin tức
    </h2>
    <a href="{{ route('admin.news.create') }}"
    class="inline-flex items-center gap-2 bg-yellow-200 text-black font-semibold px-6 py-3 rounded-full shadow hover:bg-yellow-300 transition transform hover:scale-105">
   <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 stroke-black" fill="none" viewBox="0 0 24 24" stroke-width="2">
     <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
   </svg>
   Tạo mới
 </a>


  </div>

  @if(session('success'))
    <div
      x-data="{ show: true }"
      x-show="show"
      x-init="setTimeout(() => show = false, 4000)"
      class="mb-6 p-4 rounded-lg bg-green-100 border border-green-300 text-green-800 shadow flex items-center gap-3"
      role="alert"
    >
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5 2a9 9 0 11-18 0 9 9 0 0118 0z" />
      </svg>
      <p class="font-semibold">{{ session('success') }}</p>
      <button @click="show = false" class="ml-auto text-green-700 hover:text-green-900">
        &times;
      </button>
    </div>
  @endif

  <div class="overflow-x-auto rounded-xl shadow-lg border border-gray-200">
    <table class="min-w-full bg-white rounded-lg">
  <thead class="bg-white text-black border-b border-gray-300">
  <tr>
    <th class="px-5 py-3 text-left text-sm font-semibold border-b-2 border-gray-200">STT</th> <!-- Thêm cột STT -->
    <th class="px-5 py-3 text-left text-sm font-semibold border-b-2 border-gray-200">ID</th>
    <th class="px-5 py-3 text-left text-sm font-semibold border-b-2 border-gray-200">Tiêu đề</th>
    <th class="px-5 py-3 text-left text-sm font-semibold border-b-2 border-gray-200">Slug</th>
    <th class="px-5 py-3 text-left text-sm font-semibold border-b-2 border-gray-200">Danh mục</th>
    <th class="px-5 py-3 text-left text-sm font-semibold border-b-2 border-gray-200">Ngày tạo</th>
    <th class="px-5 py-3 text-left text-sm font-semibold border-b-2 border-gray-200">Cập nhật</th>
    <th class="px-5 py-3 text-left text-sm font-semibold border-b-2 border-gray-200">👁️ Lượt xem</th>
    <th class="px-5 py-3 text-center text-sm font-semibold border-b-2 border-gray-200">🛠 Thao tác</th>
  </tr>
</thead>
<tbody class="text-gray-800">
  @forelse($news as $item)
    <tr class="border-b hover:bg-gray-100 transition">
      <td class="px-5 py-3">
        {{ ($news->currentPage() - 1) * $news->perPage() + $loop->iteration }}
      </td>
      <td class="px-5 py-3">{{ $item->id }}</td>
      <td class="px-5 py-3 font-medium text-indigo-700">{{ $item->title }}</td>
      <td class="px-5 py-3">{{ $item->slug }}</td>
      <td class="px-5 py-3">{{ $item->category->name ?? 'Chưa phân loại' }}</td>
      <td class="px-5 py-3">{{ $item->created_at->format('d/m/Y H:i') }}</td>
      <td class="px-5 py-3">{{ $item->updated_at->format('d/m/Y H:i') }}</td>
      <td class="px-5 py-3">{{ $item->views ?? 0 }} lượt</td>
      <td class="px-5 py-3 text-center space-x-2">
        <a href="{{ route('admin.news.edit', $item) }}" class="text-blue-500 hover:text-blue-700 font-semibold transition">✏️ Sửa</a>
        <form action="{{ route('admin.news.destroy', $item) }}" method="POST" class="inline" onsubmit="return confirm('Bạn chắc chắn muốn xóa?')">
          @csrf
          @method('DELETE')
          <button type="submit" class="text-red-500 hover:text-red-700 font-semibold transition">🗑️ Xóa</button>
        </form>
      </td>
    </tr>
  @empty
    <tr>
      <td colspan="9" class="text-center py-6 text-gray-500">🚫 Không có tin tức nào.</td>
    </tr>
  @endforelse
</tbody>


    </table>
  </div>

  <div class="mt-8 flex justify-end">
    {{ $news->appends(request()->query())->links('pagination::tailwind') }}
  </div>
</div>
@endsection
