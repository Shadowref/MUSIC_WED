@extends('layouts.app')

@section('content')
<style>
  /* Custom card style bổ sung cho Tailwind */
  .custom-card {
    border: 2px solid #323232; /* viền đậm màu chính */
    box-shadow: 4px 4px #323232; /* bóng đổ sắc nét */
    border-radius: 5px; /* bo góc */
    transition: box-shadow 0.3s ease;
    display: flex;
    flex-direction: column;
  }
  .custom-card:hover {
    box-shadow: 6px 6px #2d8cf0; /* đổi bóng đổ khi hover */
  }
  .custom-card img {
    border-top-left-radius: 80px 50px;
    border-top-right-radius: 80px 50px;
    border: 2px solid black;
    background-color: #228b22;
    background-image: linear-gradient(to top, transparent 10px, rgba(0,0,0,0.3) 10px, rgba(0,0,0,0.3) 13px, transparent 13px);
    object-fit: cover;
    transition: transform 0.3s ease;
  }
  .custom-card img:hover {
    transform: scale(1.05);
  }
  .custom-card-title {
    color: #323232;
    font-weight: 600;
    font-size: 1.25rem; /* tương đương text-xl */
    margin-bottom: 0.75rem; /* mb-3 */
    transition: color 0.2s ease;
  }
  .custom-card-title:hover {
    color: #1e40af; /* hover màu xanh đậm hơn */
  }
  .custom-card-desc {
    color: #4b5563; /* text-gray-600 */
    font-size: 0.875rem; /* text-sm */
    flex-grow: 1;
    line-height: 1.5;
  }
  .custom-card-date {
    margin-top: 1.25rem; /* mt-5 */
    font-size: 0.75rem; /* text-xs */
    color: #9ca3af; /* text-gray-400 */
  }
</style>

<div class="container mx-auto py-10 px-4">
    <!-- Tiêu đề danh mục -->
    <h1 class="text-4xl font-extrabold text-center text-gray-900 mb-12 uppercase tracking-wide">
        Danh mục: {{ $category->name }}
    </h1>

    <!-- Danh sách bài viết -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse ($newsItems as $item)
            <div class="bg-white custom-card overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300 flex flex-col">
                <a href="{{ route('news.show', $item->slug) }}" class="block overflow-hidden">
                    @if ($item->image)
                        <img
                            src="{{ asset('storage/' . $item->image) }}"
                            alt="{{ $item->title }}"
                            class="w-full h-48"
                        >
                    @else
                        <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-400 text-sm rounded-t-xl">
                            Không có ảnh
                        </div>
                    @endif
                </a>

                <div class="p-6 flex flex-col flex-grow">
                    <a href="{{ route('news.show', $item->slug) }}" class="custom-card-title">
                        {{ $item->title }}
                    </a>
                    <p class="custom-card-desc">
                        {{ Str::limit(strip_tags($item->content), 100) }}
                    </p>
                    <div class="custom-card-date">
                        Đăng ngày {{ $item->created_at->format('d/m/Y') }}
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center text-gray-500 text-lg py-12">
                Chưa có bài viết trong danh mục này.
            </div>
        @endforelse
    </div>

    <!-- Phân trang -->
    <div class="flex justify-center mt-12">
        {{ $newsItems->links('vendor.pagination.tailwind') }}
    </div>
</div>
@endsection
