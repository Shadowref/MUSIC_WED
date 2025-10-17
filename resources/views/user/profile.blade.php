{{-- resources/views/user/profile.blade.php --}}
@extends('layouts.app')

@section('content')
  <div class="container mx-auto py-6">
    <h1 class="text-2xl font-bold mb-4">Hồ sơ: {{ $user->name }}</h1>

    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Ngày tham gia:</strong> {{ $user->created_at->format('d/m/Y') }}</p>

    {{-- Chỉ chủ tài khoản mới được thấy nút Sửa --}}
    @if(auth()->id() === $user->id)
      <a href="{{ route('profile.edit') }}"
         class="mt-4 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        Chỉnh sửa hồ sơ
      </a>
    @endif
  </div>
@endsection
