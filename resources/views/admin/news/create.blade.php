@extends('layouts.admin')

@section('title', 'Tạo Tin tức mới')
@section('page_title', 'Tạo Tin tức')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-lg">
  <h2 class="text-3xl font-bold mb-6 text-gray-800 border-b pb-4">Thêm Tin tức mới</h2>

  @if ($errors->any())
    <div class="mb-6 bg-red-50 border border-red-300 text-red-700 p-4 rounded">
      <ul class="list-disc list-inside space-y-1">
        @foreach ($errors->all() as $err)
          <li>{{ $err }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
    @csrf

    <!-- Tiêu đề -->
    <div>
      <label for="title" class="block text-sm font-semibold mb-2 text-gray-700">Tiêu đề <span class="text-red-500">*</span></label>
      <input type="text" id="title" name="title" value="{{ old('title') }}" required
        class="w-full border border-gray-300 rounded-md px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200">
      @error('title')
      <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>

    <!-- Slug -->
    <div>
      <label for="slug" class="block text-sm font-semibold mb-2 text-gray-700">Slug <span class="text-red-500">*</span></label>
      <input type="text" id="slug" name="slug" value="{{ old('slug') }}" required
        class="w-full border border-gray-300 rounded-md px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200">
      @error('slug')
      <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>

    <!-- Danh mục -->
    <div>
      <label for="category_id" class="block text-sm font-semibold mb-2 text-gray-700">Danh mục <span class="text-red-500">*</span></label>
      <select name="category_id" id="category_id" required
        class="w-full border border-gray-300 rounded-md px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200">
        <option value="" disabled {{ old('category_id') ? '' : 'selected' }}>-- Chọn danh mục --</option>
        @foreach ($categories as $category)
        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
          {{ $category->name }}
        </option>
        @endforeach
      </select>
      @error('category_id')
      <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>

    <!-- Ảnh đại diện -->
    <div>
      <label for="image" class="block text-sm font-semibold mb-2 text-gray-700">Ảnh đại diện</label>
      <input type="file" id="image" name="image" accept="image/*"
        class="w-full text-gray-700 border border-gray-300 rounded-md px-3 py-2 cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200"
        onchange="previewImage(event)">
      @error('image')
      <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
      @enderror

      <div class="mt-3">
        <img id="imagePreview" src="#" alt="Ảnh xem trước" class="max-h-48 rounded-md shadow-sm hidden object-contain">
      </div>
    </div>

    <!-- Lượt xem -->
    <div>
      <label for="views" class="block text-sm font-semibold mb-2 text-gray-700">Lượt xem</label>
      <input type="number" id="views" name="views" value="{{ old('views', 0) }}" min="0"
        class="w-full border border-gray-300 rounded-md px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200">
      @error('views')
      <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>

    <!-- Tóm tắt -->
    <div>
      <label for="summary" class="block text-sm font-semibold mb-2 text-gray-700">Tóm tắt</label>
      <textarea id="summary" name="summary" rows="3"
        class="w-full border border-gray-300 rounded-md px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200">{{ old('summary') }}</textarea>
      @error('summary')
      <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>

    <!-- Nội dung -->
    <div>
      <label for="content" class="block text-sm font-semibold mb-2 text-gray-700">Nội dung <span
          class="text-red-500">*</span></label>
      <textarea id="content" name="content" rows="6" required
        class="w-full border border-gray-300 rounded-md px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200">{{ old('content') }}</textarea>
      @error('content')
      <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>

    <!-- Tải âm thanh -->
    <div>
      <label for="audio" class="block text-sm font-semibold mb-2 text-gray-700">Tải âm thanh (MP3, WAV, ...)</label>
      <input type="file" id="audio" name="audio" accept="audio/*"
        class="w-full text-gray-700 border border-gray-300 rounded-md px-3 py-2 cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200"
        onchange="previewAudio(event)">
      @error('audio')
      <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
      @enderror
      <audio id="audioPreview" controls class="mt-2 hidden w-full"></audio>
    </div>

    <!-- Tải video -->
    <div>
      <label for="video" class="block text-sm font-semibold mb-2 text-gray-700">Tải video (MP4, AVI, ...)</label>
      <input type="file" id="video" name="video" accept="video/*"
        class="w-full text-gray-700 border border-gray-300 rounded-md px-3 py-2 cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200"
        onchange="previewVideo(event)">
      @error('video')
      <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
      @enderror
      <video id="videoPreview" controls class="mt-2 hidden max-h-56 w-full rounded-md"></video>
    </div>

    <!-- Nút lưu và hủy -->
    <div class="flex justify-end space-x-4 mt-8">
      <a href="{{ route('admin.news.index') }}"
        class="px-6 py-3 bg-gray-300 rounded-md text-gray-700 font-semibold hover:bg-gray-400 transition duration-200">Hủy</a>
      <button type="submit"
        class="px-6 py-3 bg-blue-600 rounded-md text-white font-semibold hover:bg-blue-700 transition duration-200">Lưu</button>
    </div>
  </form>
</div>

<script>
  function previewImage(event) {
    const input = event.target;
    const preview = document.getElementById('imagePreview');
    if (input.files && input.files[0]) {
      const reader = new FileReader();
      reader.onload = e => {
        preview.src = e.target.result;
        preview.classList.remove('hidden');
      };
      reader.readAsDataURL(input.files[0]);
    } else {
      preview.src = '#';
      preview.classList.add('hidden');
    }
  }

  function previewAudio(event) {
    const input = event.target;
    const preview = document.getElementById('audioPreview');
    if (input.files && input.files[0]) {
      preview.src = URL.createObjectURL(input.files[0]);
      preview.classList.remove('hidden');
    } else {
      preview.src = '';
      preview.classList.add('hidden');
    }
  }

  function previewVideo(event) {
    const input = event.target;
    const preview = document.getElementById('videoPreview');
    if (input.files && input.files[0]) {
      preview.src = URL.createObjectURL(input.files[0]);
      preview.classList.remove('hidden');
    } else {
      preview.src = '';
      preview.classList.add('hidden');
    }
  }
</script>
@endsection
