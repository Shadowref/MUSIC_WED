@extends('layouts.app')

@section('title', 'Đề xuất')

@section('content')
<style>
/* Style cho link tiêu đề bài viết */
.custom-link {
  text-decoration: none;
  color: black;
  transition: color 0.3s ease;
}

.custom-link:hover {
  color: #1e90ff; /* xanh biển khi hover */
}
</style>

<div class="container mx-auto py-8">
  <h1 class="text-3xl font-bold mb-6">Bài viết đề xuất</h1>

  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($news as $item)
      <div class="bg-white dark:bg-gray-800 rounded-lg shadow hover:shadow-lg transition">
        @if($item->thumbnail)
          <a href="{{ route('news.show', $item->slug) }}">
            <img src="{{ asset('storage/' . $item->thumbnail) }}"
                 alt="{{ $item->title }}"
                 class="w-full h-40 object-cover rounded-t-lg">
          </a>
        @endif
        <div class="p-4">
          <a href="{{ route('news.show', $item->slug) }}"
             class="block text-lg font-semibold custom-link mb-2">
            {{ Str::limit($item->title, 60) }}
          </a>
          <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
            {{ Str::limit(strip_tags($item->content), 100) }}
          </p>
          <div class="flex items-center text-xs text-gray-500 dark:text-gray-400 space-x-2">
            <span>{{ $item->created_at->format('d/m/Y') }}</span>
            <span>•</span>
            <span>{{ $item->views }} lượt xem</span>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection
