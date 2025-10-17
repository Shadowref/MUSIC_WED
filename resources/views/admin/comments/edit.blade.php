@extends('layouts.admin')
@section('title','Sửa bình luận')
@section('page_title','Sửa bình luận')

@section('content')
<div class="bg-white p-6 rounded shadow max-w-xl mx-auto">
  <h2 class="text-2xl font-bold mb-4">Sửa bình luận #{{ $comment->id }}</h2>

  @if ($errors->any())
    <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
      <ul class="list-disc pl-5">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('admin.comments.update', $comment) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-4">
      <label for="content" class="block font-semibold mb-1">Nội dung</label>
      <textarea name="content" id="content" rows="5" class="w-full border px-3 py-2 rounded" required>{{ old('content', $comment->content) }}</textarea>
    </div>

    <button type="submit" class="bg-yellow-300 text-black px-4 py-2 rounded hover:bg-yellow-400">
        Cập nhật
      </button>

    <a href="{{ route('admin.comments.index') }}" class="ml-4 text-gray-600 hover:underline">Hủy</a>
  </form>
</div>
@endsection
