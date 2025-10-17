@extends('layouts.admin')
@section('title','Quản lý bình luận')
@section('page_title','Quản lý bình luận')

@section('content')
<div class="bg-white p-6 rounded shadow">
  <h2 class="text-2xl font-bold mb-4 flex justify-between items-center">
    Danh sách bình luận

  </h2>

  @if(session('success'))
    <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
      {{ session('success') }}
    </div>
  @endif

 <table class="min-w-full bg-white border">
  <thead>
    <tr class="bg-gray-100">
      <th class="border px-4 py-2">STT</th> {{-- Cột số thứ tự --}}
      <th class="border px-4 py-2">ID</th>
      <th class="border px-4 py-2">Nội dung</th>
      <th class="border px-4 py-2">Người dùng</th>
      <th class="border px-4 py-2">Bài viết</th>
      <th class="border px-4 py-2">Thời gian</th>
      <th class="border px-4 py-2">Hành động</th>
    </tr>
  </thead>
  <tbody>
    @foreach($comments as $comment)
      <tr>
        <td class="border px-4 py-2">{{ $loop->iteration }}</td> {{-- Số thứ tự --}}
        <td class="border px-4 py-2">{{ $comment->id }}</td>
        <td class="border px-4 py-2">{{ $comment->content }}</td>
        <td class="border px-4 py-2">{{ $comment->user->name ?? 'Không rõ' }}</td>
        <td class="border px-4 py-2">{{ $comment->news->title ?? 'Không rõ' }}</td>
        <td class="border px-4 py-2">{{ $comment->created_at->diffForHumans() }}</td>
        <td class="border px-4 py-2 flex gap-2 items-center">
          <a href="{{ route('admin.comments.edit', $comment) }}"
             class="inline-flex items-center gap-1 bg-yellow-400 hover:bg-yellow-500 text-yellow-900 font-semibold px-4 py-2 rounded shadow
                    transition duration-300 ease-in-out
                    focus:outline-none focus:ring-2 focus:ring-yellow-300"
             title="Sửa bình luận">
            <!-- SVG icon -->
            Sửa
          </a>

          <form action="{{ route('admin.comments.destroy', $comment) }}" method="POST" onsubmit="return confirm('Xóa bình luận này?')">
            @csrf
            @method('DELETE')
            <button type="submit"
              class="bg-red-600 hover:bg-red-700 text-white font-semibold px-4 py-2 rounded shadow
                     transition duration-300 ease-in-out
                     focus:outline-none focus:ring-2 focus:ring-red-400">
              Xóa
            </button>
          </form>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>


  <div class="mt-4">
    {{ $comments->links() }}
  </div>
</div>
@endsection
