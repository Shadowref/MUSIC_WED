@extends('layouts.app')

@section('title', $news->title)

@section('content')
<div class="container mx-auto px-4 py-6">
    {{-- Breadcrumb --}}
    <nav class="text-sm text-gray-600 mb-6">
        <a href="{{ route('home') }}" class="text-blue-600 hover:text-blue-800 font-semibold transition duration-300">Trang chủ</a>
        @if(optional($news->category)->slug)
            / <a href="{{ route('category.show', $news->category->slug) }}" class="text-blue-600 hover:text-blue-800 font-semibold transition duration-300">{{ $news->category->name }}</a>
        @endif
        / <span class="text-gray-800 font-bold text-lg">{{ $news->title }}</span>
    </nav>

    {{-- Title & Meta --}}
    <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4 leading-tight">{!! nl2br(e($news->title)) !!}</h1>
    <div class="text-gray-600 mb-8">
        <span class="font-medium">Ngày đăng:</span> {{ $news->created_at->format('d/m/Y') }} |
        <span class="font-medium">Lượt xem:</span> {{ $news->views }}
    </div>

    {{-- Image --}}
    @if($news->image)
        <div class="mb-8">
            <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" class="w-full rounded-xl shadow-xl object-cover hover:scale-105 transition duration-300 ease-in-out">
        </div>

    @endif

        {{-- Audio --}}
        @if($news->audio)
        <div class="mb-8 relative">

            <audio id="audio-player" controls class="w-full bg-black p-4 rounded-lg shadow-xl">
                <source src="{{ asset('storage/' . $news->audio) }}" type="audio/mpeg">
                Your browser does not support the audio tag.
            </audio>

        </div>
    @endif




    {{-- Content --}}
    <div class="prose max-w-none mb-8 text-gray-800 leading-relaxed text-lg">
        {!! nl2br(e($news->content)) !!}
    </div>

        {{-- Video --}}
        @if($news->video)
        <div class="mb-8 relative">

            <video id="video-player" class="w-full rounded-xl shadow-xl" controls>
                <source src="{{ asset('storage/' . $news->video) }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
    @endif

    {{-- Categories --}}
    @if($categories->isNotEmpty())
        <div class="mb-8">
            <h3 class="text-2xl font-semibold text-gray-900 mb-4">Chuyên mục khác</h3>
            <ul class="flex flex-wrap gap-4">
                @foreach($categories as $categoryItem)
                    <li>
                        <a href="{{ route('category.show', $categoryItem->slug) }}" class="bg-blue-50 hover:bg-blue-100 text-blue-600 px-4 py-2 rounded-lg transition-all duration-300 ease-in-out">
                            {{ $categoryItem->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Comment Section --}}
    <section class="mb-12">
        <h3 class="text-2xl font-semibold mb-6 text-gray-900">Bình luận ({{ $news->comments->count() }})</h3>

        {{-- Success Message --}}
        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded-lg mb-6 shadow-md">
                {{ session('success') }}
            </div>
        @endif

        {{-- Comment Form --}}
        @auth
            <form method="POST" action="{{ route('comments.store', $news->slug) }}" class="mb-8 shadow-lg p-6 bg-white rounded-lg border border-gray-300">
                @csrf
                <textarea name="content" rows="4" class="w-full border border-gray-300 p-4 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Viết bình luận..." required>{{ old('content') }}</textarea>
                @error('content')
                    <div class="text-red-500 mt-2">{{ $message }}</div>
                @enderror
                <button type="submit" class="mt-4 bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 focus:outline-none transition duration-300">Gửi bình luận</button>
            </form>
        @else
            <p>Bạn cần <a href="{{ route('login') }}" class="text-blue-600 hover:underline">đăng nhập</a> để bình luận.</p>
        @endauth

        {{-- Comment List --}}
        <div class="space-y-6">
            @forelse($comments as $comment)
                <div class="border border-gray-300 p-6 rounded-lg bg-white shadow-md">
                    <div class="flex justify-between items-center mb-4">
                        <strong class="text-lg font-semibold text-gray-800">{{ $comment->user->name ?? 'Người dùng' }}</strong>
                        <span class="text-sm text-gray-500">{{ $comment->created_at->format('d/m/Y H:i') }}</span>
                    </div>
                    <p class="text-gray-700">{{ $comment->content }}</p>

                    {{-- Edit and Delete options --}}
                    @if(Auth::id() === $comment->user_id)
                        <div class="mt-6 flex gap-4">
                            <!-- Edit Form -->
                            <form action="{{ route('comments.update', $comment) }}" method="POST" class="d-inline w-full">
                                @csrf
                                <input type="text" name="content" value="{{ $comment->content }}" required class="border border-gray-300 p-4 rounded-lg w-full shadow-md">
                                <button type="submit" class="mt-2 bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 focus:outline-none transition duration-300">Sửa</button>
                            </form>

                            <!-- Delete Form -->
                            <form action="{{ route('comments.destroy', $comment) }}" method="POST" class="d-inline" onsubmit="return confirm('Bạn chắc chắn muốn xóa?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="mt-2 bg-red-600 text-white px-6 py-2 rounded-lg hover:bg-red-700 focus:outline-none transition duration-300">Xóa</button>
                            </form>
                        </div>
                    @endif
                </div>
            @empty
                <p class="text-gray-600">Chưa có bình luận nào.</p>
            @endforelse
        </div>
    </section>
</div>
@endsection
