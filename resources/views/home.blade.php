@extends('layouts.app')

@section('title', 'Trang chủ')

@section('content')


{{-- Video nổi bật --}}
<section>
     <h2 class="text-2xl font-bold text-red-600 mb-5 border-b-2 pb-2 border-red-400">
      🎥 Video nổi bật
    </h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      <!-- Video 1 -->
      <div class="relative bg-white rounded-xl shadow-md overflow-hidden h-64">
        <video autoplay muted playsinline loop class="w-full h-full object-cover">
            <source src="{{ asset('storage/videos/girlxinh.mp4') }}" type="video/mp4">
            Trình duyệt của bạn không hỗ trợ video.
          </video>

      </div>

      <!-- Video 2 -->
      <div class="relative bg-white rounded-xl shadow-md overflow-hidden h-64">
        <video autoplay muted loop class="w-full h-full object-cover">
          <source src="{{ asset('storage/videos/depnhatlaem.mp4') }}" type="video/mp4">
          Trình duyệt của bạn không hỗ trợ video.
        </video>
      </div>
    </div>
  </section>

  {{-- Bài viết đề xuất --}}
  <section>
     <h2 class="text-2xl font-bold text-red-600 mb-5 border-b-2 pb-2 border-red-400">
      🔍 Bài viết đề xuất
    </h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      @foreach($recommendedNews as $item)
      <a href="{{ route('news.show', $item->slug) }}" class="block bg-white rounded-xl shadow-md hover:shadow-xl transition">
        @if($item->image)
        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="w-full h-40 object-cover rounded-t-lg">
        @endif
        <div class="p-4">
          <h4 class="text-lg font-semibold text-gray-800 hover:text-red-600">{{ $item->title }}</h4>
          <p class="text-sm text-gray-600 mt-2">{{ Str::limit(strip_tags($item->summary), 100) }}</p>
        </div>
      </a>
      @endforeach
    </div>
  </section>

  {{-- Tin mới nhất --}}
  <section>
    <h2 class="text-2xl font-bold text-red-600 mb-5 border-b-2 pb-2 border-red-400">
      🆕 Tin mới nhất
    </h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      @foreach($latestNews as $item)
      <a href="{{ route('news.show', $item->slug) }}" class="block bg-white rounded-xl shadow-md hover:shadow-xl transition">
        @if($item->image)
        <img src="{{ asset('storage/' . $item->image) }}" class="w-full h-40 object-cover rounded-t-lg" alt="{{ $item->title }}">
        @endif
        <div class="p-4">
          <h4 class="text-lg font-semibold text-gray-800 hover:text-red-600">{{ $item->title }}</h4>
          <p class="text-sm text-gray-600 mt-2">{{ Str::limit(strip_tags($item->summary), 100) }}</p>
        </div>
      </a>
      @endforeach
    </div>
  </section>

  {{-- Bài viết xem nhiều --}}
  <section>
     <h2 class="text-2xl font-bold text-red-600 mb-5 border-b-2 pb-2 border-red-400">
      🔥 Xem nhiều
    </h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      @foreach($popularNews as $pop)
      <a href="{{ route('news.show', $pop->slug) }}" class="block bg-white rounded-xl shadow-md hover:shadow-xl transition">
        @if($pop->image)
        <img src="{{ asset('storage/' . $pop->image) }}" alt="{{ $pop->title }}" class="w-full h-40 object-cover rounded-t-lg">
        @endif
        <div class="p-4">
          <h4 class="text-lg font-semibold text-gray-800 hover:text-red-600">{{ Str::limit($pop->title, 60) }}</h4>
        </div>
      </a>
      @endforeach
    </div>
  </section>

  {{-- Bình luận mới --}}
  <section>
     <h2 class="text-2xl font-bold text-red-600 mb-5 border-b-2 pb-2 border-red-400">
      💬 Bình luận mới
    </h2>
    <ul class="space-y-4">
      @foreach($recentComments as $cmt)
      <li class="flex items-start bg-white rounded-xl p-4 shadow hover:shadow-lg transition transform hover:-translate-y-1">
        <div class="flex-shrink-0">
          <div class="w-10 h-10 bg-red-500 rounded-full flex items-center justify-center text-white font-bold shadow-inner">
            {{ strtoupper(substr($cmt->user->name, 0, 1)) }}
          </div>
        </div>
        <div class="ml-3 flex-1">
          <div class="flex justify-between items-center mb-1">
            <span class="font-semibold text-gray-800">{{ $cmt->user->name }}</span>
            <span class="text-xs text-gray-500">{{ $cmt->created_at->diffForHumans() }}</span>
          </div>
          <p class="text-sm text-gray-700 leading-snug">{{ Str::limit($cmt->content, 100) }}</p>
        </div>
      </li>
      @endforeach
    </ul>
  </section>

<section>
  <h2 class="text-2xl font-bold text-red-600 mb-5 border-b-2 pb-2 border-red-400">
    📂 Danh mục
  </h2>
  <div class="flex flex-wrap gap-2">
@foreach($categories as $cat)
  <a href="{{ route('category.show', $cat->slug) }}"
     class="px-4 py-2 text-sm text-black hover:text-blue-500 transition-colors duration-300 no-underline">
    {{ $cat->name }}
  </a>
@endforeach


  </div>
</section>

<style>
    a {
  text-decoration: none;
  color: black;
  transition: color 0.3s ease;
}

a:hover {
  color: #1e90ff; /* Màu xanh biển khi hover */
}

</style>

<footer class="mt-12 border-t pt-6 text-center text-sm text-gray-500">
  <p class="mb-4 font-semibold">Theo dõi chúng tôi:</p>
  <ul class="example-2">
    <li class="icon-content">
      <a href="https://www.facebook.com/nie.suong.24" data-social="linkedin" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
        <div class="filled"></div>
        <!-- Facebook SVG icon -->
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
          <path d="M22 12.07C22 6.48 17.52 2 12 2S2 6.48 2 12.07c0 5.02 3.66 9.17 8.44 9.93v-7.03h-2.54v-2.9h2.54V9.41c0-2.5 1.49-3.89 3.78-3.89 1.1 0 2.25.2 2.25.2v2.48h-1.27c-1.25 0-1.64.77-1.64 1.56v1.87h2.79l-.45 2.9h-2.34v7.03C18.34 21.24 22 17.09 22 12.07z"/>
        </svg>
      </a>
      <span class="tooltip">Facebook</span>
    </li>

    <li class="icon-content">
      <a href="https://www.youtube.com/@syn4705" data-social="youtube" target="_blank" rel="noopener noreferrer" aria-label="YouTube">
        <div class="filled"></div>
        <!-- YouTube SVG icon -->
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
          <path d="M21.8 8s-.2-1.43-.82-2.06c-.78-.83-1.66-.83-2.06-.88C15.78 5 12 5 12 5s-3.78 0-6.92.06c-.4 0-1.28.05-2.06.88C2.4 6.57 2.2 8 2.2 8S2 9.63 2 11.27v1.46C2 14.37 2.2 16 2.2 16s.2 1.43.82 2.06c.78.83 1.8.8 2.25.89 1.63.12 6.92.06 6.92.06s3.78 0 6.92-.06c.4 0 1.28-.05 2.06-.88.62-.63.82-2.06.82-2.06s.2-1.63.2-3.27v-1.46C22 9.63 21.8 8 21.8 8zM10 14.8V9.2l5.2 2.8-5.2 2.8z"/>
        </svg>
      </a>
      <span class="tooltip">YouTube</span>
    </li>

    <li class="icon-content">
      <a href="https://www.tiktok.com/@niesuong475" data-social="instagram" target="_blank" rel="noopener noreferrer" aria-label="TikTok">
        <div class="filled"></div>
        <!-- TikTok SVG icon -->
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
          <path d="M12 2C8.13 2 5 5.13 5 9.5c0 3.61 2.54 6.59 6 7.17v-2.26a3.28 3.28 0 0 1-3-3.31c0-1.79 1.46-3.24 3.26-3.24 1.07 0 2.03.55 2.56 1.37h1.2V7.53A5.39 5.39 0 0 1 12 7.5v-5z"/>
        </svg>
      </a>
      <span class="tooltip">TikTok</span>
    </li>
  </ul>
</footer>

<style>ul {
  list-style: none;
  padding: 0;
  margin: 0 auto;
}

.example-2 {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: row;
  gap: 20px;
}
.example-2 .icon-content {
  margin: 0;
  position: relative;
  padding: 0.5rem;
}

.example-2 .icon-content .tooltip {
  position: absolute;
  top: 100%;
  right: 110%;
  transform: translateY(200%);
  color: #fff;
  padding: 6px 10px;
  border-radius: 5px;
  opacity: 0;
  visibility: hidden;
  font-size: 14px;
  transition: all 0.3s ease;
  white-space: nowrap;
}
.example-2 .icon-content a {
  position: relative;
  overflow: hidden;
  display: flex;
  justify-content: center;
  align-items: center;
  width: 50px;
  height: 50px;
  border-radius: 50%;
  color: #4d4d4d;
  background-color: #fff;
  transition: all 0.3s ease-in-out;
  text-decoration: none;
}
.example-2 .icon-content a:hover {
  box-shadow: 3px 2px 45px 0px rgb(0 0 0 / 12%);
  color: white;
}
.example-2 .icon-content a svg {
  position: relative;
  z-index: 1;
  width: 30px;
  height: 30px;
}
.example-2 .icon-content a .filled {
  position: absolute;
  top: auto;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 0;
  background-color: #000;
  transition: all 0.3s ease-in-out;
}
.example-2 .icon-content a:hover .filled {
  height: 100%;
}

.example-2 .icon-content a[data-social="linkedin"] .filled,
.example-2 .icon-content a[data-social="linkedin"] ~ .tooltip {
  background-color: #0274b3;
}

.example-2 .icon-content a[data-social="github"] .filled,
.example-2 .icon-content a[data-social="github"] ~ .tooltip {
  background-color: #24262a;
}
.example-2 .icon-content a[data-social="instagram"] .filled,
.example-2 .icon-content a[data-social="instagram"] ~ .tooltip {
  background: linear-gradient(
    45deg,
    #405de6,
    #5b51db,
    #b33ab4,
    #c135b4,
    #e1306c,
    #fd1f1f
  );
}
.example-2 .icon-content a[data-social="youtube"] .filled,
.example-2 .icon-content a[data-social="youtube"] ~ .tooltip {
  background-color: #ff0000;
}
</style>






@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
  const avatarContainer = document.getElementById('avatar-container');
  const avatarInput = document.getElementById('avatar-input');

  if (avatarContainer && avatarInput) {
    avatarContainer.addEventListener('click', () => {
      avatarInput.click();
    });

    avatarInput.addEventListener('change', () => {
      const file = avatarInput.files[0];
      if (file) {
        const imgPreview = avatarContainer.querySelector('img');
        if (imgPreview) {
          imgPreview.src = URL.createObjectURL(file);
        }

        const form = document.getElementById('avatar-form');
        if (form) {
          form.submit();
        }
      }
    });
  }
});
</script>
@endpush
