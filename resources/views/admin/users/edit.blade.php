@extends('layouts.admin')
@section('title','Sửa Người dùng')
@section('page_title','Sửa Người dùng')

@section('content')
<div class="max-w-xl mx-auto bg-white p-8 rounded-2xl shadow-lg border">
  <h2 class="text-3xl font-bold text-blue-700 mb-6 text-center">🛠️ Cập nhật Người dùng</h2>

  @if($errors->any())
    <div class="mb-4 bg-red-100 text-red-700 p-4 rounded-lg border border-red-300">
      <ul class="list-disc list-inside space-y-1">
        @foreach($errors->all() as $err)
          <li>{{ $err }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('admin.users.update', $user) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
    @csrf @method('PUT')

    <div>
      <label class="block mb-1 font-medium text-gray-700">👤 Tên người dùng</label>
      <input type="text" name="name" value="{{ old('name', $user->name) }}" required
             class="w-full border border-gray-300 p-3 rounded-lg focus:ring-2 focus:ring-blue-400">
    </div>

    <div>
      <label class="block mb-1 font-medium text-gray-700">📧 Email</label>
      <input type="email" name="email" value="{{ old('email', $user->email) }}" required
             class="w-full border border-gray-300 p-3 rounded-lg focus:ring-2 focus:ring-blue-400">
    </div>

    <div>
      <label class="block mb-1 font-medium text-gray-700">🖼️ Ảnh đại diện hiện tại</label>
      @if($user->avatar)
        <img src="{{ asset('storage/'.$user->avatar) }}"
             alt="Avatar"
             class="h-20 w-20 rounded-full object-cover border shadow mb-2">
      @else
        <p class="text-sm text-gray-500 italic">Chưa có ảnh đại diện.</p>
      @endif
    </div>

    <div>
      <label class="block mb-1 font-medium text-gray-700">📤 Ảnh đại diện mới (nếu có)</label>
      <input type="file" name="avatar" accept="image/*"
             class="w-full border border-gray-300 p-3 rounded-lg file:mr-3 file:py-1 file:px-4 file:rounded file:border-0 file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 focus:ring-2 focus:ring-blue-400">
    </div>

    <div>
      <label class="block mb-1 font-medium text-gray-700">🎯 Vai trò</label>
      <select name="role"
              class="w-full border border-gray-300 p-3 rounded-lg focus:ring-2 focus:ring-blue-400">
        <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>Người dùng</option>
        <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Quản trị viên</option>
      </select>
    </div>

    <div class="flex justify-between pt-4">
      <a href="{{ route('admin.users.index') }}"
         class="inline-flex items-center px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
         ❌ Hủy
      </a>
      <button type="submit"
              class="inline-flex items-center px-6 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition">
        💾 Cập nhật
      </button>
    </div>
  </form>
</div>
@endsection
