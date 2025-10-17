@extends('layouts.admin')
@section('title','Thêm Người dùng')
@section('page_title','Thêm Người dùng')

@section('content')
<div class="max-w-xl mx-auto bg-white p-8 rounded-2xl shadow-lg border">
  <h2 class="text-3xl font-bold text-blue-700 mb-6 text-center">🧑‍💼 Thêm Người dùng mới</h2>

  @if($errors->any())
    <div class="mb-4 bg-red-100 text-red-700 p-4 rounded-lg border border-red-300">
      <ul class="list-disc list-inside space-y-1">
        @foreach($errors->all() as $err)
          <li>{{ $err }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
    @csrf

    <div>
      <label class="block mb-1 font-medium text-gray-700">👤 Tên người dùng</label>
      <input type="text" name="name" value="{{ old('name') }}" required
             class="w-full border border-gray-300 p-3 rounded-lg focus:ring-2 focus:ring-blue-400">
    </div>

    <div>
      <label class="block mb-1 font-medium text-gray-700">📧 Email</label>
      <input type="email" name="email" value="{{ old('email') }}" required
             class="w-full border border-gray-300 p-3 rounded-lg focus:ring-2 focus:ring-blue-400">
    </div>

    <div>
      <label class="block mb-1 font-medium text-gray-700">🔑 Mật khẩu</label>
      <input type="password" name="password" required
             class="w-full border border-gray-300 p-3 rounded-lg focus:ring-2 focus:ring-blue-400">
    </div>

    <div>
      <label class="block mb-1 font-medium text-gray-700">🔁 Xác nhận mật khẩu</label>
      <input type="password" name="password_confirmation" required
             class="w-full border border-gray-300 p-3 rounded-lg focus:ring-2 focus:ring-blue-400">
    </div>

    <div>
      <label class="block mb-1 font-medium text-gray-700">🎯 Vai trò</label>
      <select name="role" class="w-full border border-gray-300 p-3 rounded-lg focus:ring-2 focus:ring-blue-400" required>
        <option value="">-- Chọn vai trò --</option>
        <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>Người dùng</option>
        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Quản trị</option>
      </select>
    </div>

    <div class="flex justify-between pt-4">
      <a href="{{ route('admin.users.index') }}"
         class="inline-flex items-center px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
         ❌ Hủy
      </a>
      <button type="submit"
              class="inline-flex items-center px-6 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition">
        ✅ Thêm
      </button>
    </div>
  </form>
</div>
@endsection
