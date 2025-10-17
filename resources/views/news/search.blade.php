@extends('layouts.app')

@section('title', 'Kết quả tìm kiếm: ' . request('keyword'))

@section('content')
<div class="container mx-auto px-4 py-6">
    {{-- Breadcrumb --}}
    <nav class="text-sm mb-4">
        <a href="{{ route('home') }}" class="text-blue-600 hover:underline">Trang chủ</a> /
        <span class="text-gray-700">Tìm kiếm</span>
    </nav>

    {{-- Heading --}}
    <h1 class="text-2xl font-semibold mb-6">Kết quả tìm kiếm cho: "{{ request('keyword') }}"</h1>

    @if($news->isEmpty())
        <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-6" role="alert">
            Không tìm thấy kết quả nào cho từ khóa "{{ request('keyword') }}".
        </div>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($news as $item)
                <div class="bg-white border rounded-lg shadow hover:shadow-lg transition-shadow">
                    @if($item->image)
                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="w-full h-48 object-cover rounded-t-lg">
                    @endif
                    <div class="p-4">
                        <h2 class="text-xl font-semibold mb-2">
                            <a href="{{ route('news.show', $item->slug) }}" class="hover:underline">
                                {{ Str::limit($item->title, 60) }}
                            </a>
                        </h2>
                        <p class="text-gray-600 mb-4">{{ Str::limit($item->summary ?? $item->content, 100) }}</p>
                        <a href="{{ route('news.show', $item->slug) }}" class="text-blue-600 hover:underline">
                            Xem chi tiết →
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="mt-6">
            {{ $news->links() }}
        </div>
    @endif

    {{-- Other Categories --}}
    <div class="mt-10">
        <h3 class="text-xl font-medium mb-2">Khám phá thêm chuyên mục</h3>
        <ul class="flex flex-wrap gap-2">
            @foreach($categories as $cat)
                <li>
                    <a href="{{ route('category.show', $cat->slug) }}" class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300">
                        {{ $cat->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
