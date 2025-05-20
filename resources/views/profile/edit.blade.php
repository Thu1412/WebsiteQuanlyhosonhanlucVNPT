@extends('layouts.appuser')

@section('content')
<div class="content-wrapper">
    <div class="form-container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="text-center text-danger fw-bold">CHỈNH SỬA THÔNG TIN CÁ NHÂN</h2>
            <img src="{{ asset('uploads/nhansu/' . basename($nhansu->hinhanh ?? 'default.png')) }}" 
                 class="rounded-circle" 
                 alt="Ảnh nhân viên" 
                 width="150" 
                 height="150">
        </div>

        <!-- Hiển thị thông báo thành công -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Hiển thị lỗi validation -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            
            <div class="mb-3">
                <label for="hinhanh">📸 Ảnh đại diện</label>
                <input type="file" name="hinhanh" class="form-control">
            </div>
            
            <div class="mb-3">
                <label for="name">👩‍💼 Họ và tên</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
            </div>
            
            <div class="mb-3">
                <label for="gioitinh">🧑 Giới Tính</label>
                <select name="gioitinh" class="form-control" required>
                    <option value="male" {{ old('gioitinh', $nhansu->gioitinh ?? '') == 'male' ? 'selected' : '' }}>Nam</option>
                    <option value="female" {{ old('gioitinh', $nhansu->gioitinh ?? '') == 'female' ? 'selected' : '' }}>Nữ</option>
                    <option value="other" {{ old('gioitinh', $nhansu->gioitinh ?? '') == 'other' ? 'selected' : '' }}>Khác</option>
                </select>
            </div>
            
            <div class="mb-3">
                <label for="ngaysinh">🎂 Ngày Sinh</label>
                <input type="date" name="ngaysinh" class="form-control" value="{{ old('ngaysinh', $nhansu->ngaysinh) }}" required>
            </div>
            
            <div class="mb-3">
                <label for="sodienthoai">📞 Số Điện Thoại</label>
                <input type="text" name="sodienthoai" class="form-control" value="{{ old('sodienthoai', $nhansu->sodienthoai) }}" required>
            </div>
            
            <div class="mb-3">
                <label for="email">📍 Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
            </div>
            
            <div class="mb-3">
                <label for="password">👁 Mật Khẩu</label>
                <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu mới nếu muốn thay đổi">
            </div>
            
            <div class="mb-3">
                <label for="diachi">🏠 Chỗ ở hiện tại</label>
                <input type="text" name="diachi" class="form-control" value="{{ old('diachi', $nhansu->diachi) }}" required>
            </div>
            <a href="{{ route('profile') }}" class="btn btn-secondary">⬅️ Quay lại</a>
            <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
        </form>
    </div>
</div>
@endsection
