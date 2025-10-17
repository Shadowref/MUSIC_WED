@extends('layouts.admin')
@section('title','Quản lý Người dùng')
@section('page_title','Quản lý Người dùng')

@section('content')
<div class="flex justify-between items-center mb-6">
  <h2 class="text-2xl font-bold text-gray-800">👥 Danh sách Người dùng</h2>
  <a href="{{ route('admin.users.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2 rounded shadow transition">
    + Tạo mới người dùng
  </a>
</div>

@if(session('success'))
  <div class="mb-4 p-4 bg-green-100 border border-green-300 text-green-800 rounded shadow-sm">{{ session('success') }}</div>
@endif
@if(session('error'))
  <div class="mb-4 p-4 bg-red-100 border border-red-300 text-red-800 rounded shadow-sm">{{ session('error') }}</div>
@endif

<div class="overflow-x-auto">
<table class="min-w-full bg-white border border-gray-200 rounded shadow-sm">
<thead class="bg-gray-100 text-gray-700 text-sm uppercase tracking-wide">
  <tr>
    <th class="px-4 py-3 text-left">STT</th> <!-- Thêm cột STT -->
    <th class="px-4 py-3 text-left">ID</th>
    <th class="px-4 py-3 text-left">Tên</th>
    <th class="px-4 py-3 text-left">Email</th>
    <th class="px-4 py-3 text-left">Ngày tạo</th>
    <th class="px-4 py-3 text-left">Cập nhật</th>
    <th class="px-4 py-3 text-left">Avatar</th>
    <th class="px-4 py-3 text-left">Vai trò</th>
    <th class="px-4 py-3 text-left">Admin</th>
    <th class="px-4 py-3 text-left">Mật khẩu</th>
    <th class="px-4 py-3 text-left">Hành động</th>
  </tr>
</thead>
<tbody class="text-gray-800 text-sm">
  @forelse($users as $u)
  <tr class="border-b hover:bg-gray-50 transition">
    <td class="px-4 py-2">{{ $loop->iteration }}</td> <!-- STT -->
    <td class="px-4 py-2">{{ $u->id }}</td>
    <td class="px-4 py-2 font-medium">{{ $u->name }}</td>
    <td class="px-4 py-2">{{ $u->email }}</td>
    <td class="px-4 py-2">{{ $u->created_at->format('d/m/Y') }}</td>
    <td class="px-4 py-2">{{ $u->updated_at ? $u->updated_at->format('d/m/Y') : 'Chưa cập nhật' }}</td>
    <td class="px-4 py-2">
      @if($u->avatar)
        <img src="{{ asset('storage/' . $u->avatar) }}" alt="Avatar" class="w-8 h-8 rounded-full object-cover shadow hover:scale-105 transition-transform">
      @else
        <span class="text-gray-400 italic">Chưa có</span>
      @endif
    </td>
    <td class="px-4 py-2 capitalize">{{ $u->role }}</td>
    <td class="px-4 py-2">{{ $u->is_admin ? '✅' : '❌' }}</td>
    <td class="px-4 py-2">
      <div class="relative">
        <input type="password" id="password-{{ $u->id }}" value="{{ $u->password }}" class="bg-gray-100 border text-sm px-2 py-1 rounded w-full pr-10" readonly>
        <button type="button" onclick="togglePassword('{{ $u->id }}')" class="absolute top-1 right-2 text-gray-500 hover:text-blue-600">
          <i class="fas fa-eye"></i>
        </button>
      </div>
    </td>
    <td class="px-4 py-2 space-x-2 whitespace-nowrap">
      <a href="{{ route('admin.users.edit', $u) }}" class="inline-flex items-center text-green-600 hover:text-green-800 font-medium">
        <i class="fas fa-edit mr-1"></i> Sửa
      </a>
      <form action="{{ route('admin.users.destroy', $u) }}" method="POST" class="inline" onsubmit="return confirm('Bạn có chắc muốn xóa người dùng này?')">
        @csrf @method('DELETE')
        <button type="submit" class="inline-flex items-center text-red-600 hover:text-red-800 font-medium">
          <i class="fas fa-trash-alt mr-1"></i> Xóa
        </button>
      </form>
    </td>
  </tr>
  @empty
    <tr><td colspan="11" class="px-4 py-4 text-center text-gray-500 italic">Không có người dùng nào.</td></tr>
  @endforelse
</tbody>

</table>
</div>

<div class="mt-6">
  {{ $users->links() }}
</div>
@endsection

@section('scripts')
<script>
  function togglePassword(userId) {
    const input = document.getElementById('password-' + userId);
    if (input.type === "password") {
      input.type = "text";
    } else {
      input.type = "password";
    }
  }
</script>
@endsection
