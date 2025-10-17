@extends('layouts.admin')

@section('title', 'Sửa Tin tức')
@section('page_title', 'Sửa Tin tức')

@section('content')
  <div class="max-w-3xl mx-auto bg-white p-8 rounded-xl shadow-lg border border-gray-200">
    <h2 class="text-3xl font-bold text-indigo-700 mb-6 border-b pb-2">📝 Chỉnh sửa tin: <span class="text-gray-800">{{ $news->title }}</span></h2>

    @if($errors->any())
      <div class="mb-6 bg-red-100 border border-red-300 text-red-800 p-4 rounded-md">
        <strong>Lỗi:</strong>
        <ul class="list-disc list-inside ml-4">
          @foreach($errors->all() as $err)
            <li>{{ $err }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('admin.news.update', $news) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
      @csrf
      @method('PUT')

      <div>
        <label class="block text-gray-700 font-semibold mb-1">📌 Tiêu đề</label>
        <input type="text" name="title" value="{{ old('title', $news->title) }}" required
               class="w-full border border-gray-300 p-3 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
      </div>

      <div>
        <label class="block text-gray-700 font-semibold mb-1">🔗 Slug</label>
        <input type="text" name="slug" value="{{ old('slug', $news->slug) }}" required
               class="w-full border border-gray-300 p-3 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
      </div>

      <div>
        <label class="block text-gray-700 font-semibold mb-1">📁 Danh mục</label>
        <select name="category_id" required
                class="w-full border border-gray-300 p-3 rounded-lg focus:ring-2 focus:ring-emerald-400 focus:outline-none">
          @foreach(\App\Models\Category::all() as $cat)
            <option value="{{ $cat->id }}" {{ old('category_id', $news->category_id) == $cat->id ? 'selected' : '' }}>
              {{ $cat->name }}
            </option>
          @endforeach
        </select>
      </div>

      <div>
        <label class="block text-gray-700 font-semibold mb-1">🖼️ Ảnh hiện tại</label>
        @if($news->image)
          <img src="{{ asset('storage/' . $news->image) }}" alt="Ảnh hiện tại" class="mb-2 w-40 h-32 object-cover rounded-md shadow">
        @else
          <p class="text-sm text-gray-500">Không có ảnh hiện tại</p>
        @endif
        <input type="file" name="image" class="w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 mt-2">
      </div>

      <div>
        <label class="block text-gray-700 font-semibold mb-1">🔊 Âm thanh hiện tại</label>
        @if($news->audio)
          <audio controls class="mb-2">
            <source src="{{ asset('storage/' . $news->audio) }}" type="audio/mpeg">
            Trình duyệt không hỗ trợ audio.
          </audio>
        @else
          <p class="text-sm text-gray-500">Không có âm thanh hiện tại</p>
        @endif
        <input type="file" name="audio" class="w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100 mt-2">
      </div>

      <div>
        <label class="block text-gray-700 font-semibold mb-1">🎥 Video hiện tại</label>
        @if($news->video)
          <video width="320" height="240" controls class="mb-2 rounded-md shadow">
            <source src="{{ asset('storage/' . $news->video) }}" type="video/mp4">
            Trình duyệt không hỗ trợ video.
          </video>
        @else
          <p class="text-sm text-gray-500">Không có video hiện tại</p>
        @endif
        <input type="file" name="video" class="w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:bg-rose-50 file:text-rose-700 hover:file:bg-rose-100 mt-2">
      </div>

      <div>
        <label class="block text-gray-700 font-semibold mb-1">👁️‍🗨️ Lượt xem</label>
        <input type="number" name="views" value="{{ old('views', $news->views) }}"
               class="w-full border border-gray-300 p-3 rounded-lg focus:ring-2 focus:ring-yellow-400 focus:outline-none" min="0">
      </div>

      <div>
        <label class="block text-gray-700 font-semibold mb-1">✍️ Tóm tắt</label>
        <textarea name="summary" rows="3"
                  class="w-full border border-gray-300 p-3 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">{{ old('summary', $news->summary) }}</textarea>
      </div>

      <div>
        <label class="block text-gray-700 font-semibold mb-1">📰 Nội dung</label>
        <textarea name="content" rows="6"
                  class="w-full border border-gray-300 p-3 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">{{ old('content', $news->content) }}</textarea>
      </div>

      <div class="flex justify-end space-x-3 pt-4">
        <a href="{{ route('admin.news.index') }}" class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300 transition">🔙 Hủy</a>
        <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 shadow transition">💾 Cập nhật</button>
      </div>
    </form>
  </div>
@endsection
