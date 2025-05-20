@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="form-container">
        <div class="card p-4 shadow-lg" style="border-radius: 10px; background-color: white;">
            <h2 class="text-danger fw-bold"><i class="fas fa-plus-circle"></i>THÊM TÀI KHOẢN ADMIN</h2>
            <form action="{{ route('taikhoan.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Họ và Tên</label>
                    <input type="text" name="name" class="form-control input-custom " style="color: black !important;" required>
                </div>

                <div class="mb-3">
                                <label for="email" class="form-label fw-bold">Email</label>
                    <input type="email" name="email" class="form-control input-custom " style="color: black !important;" required>
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label fw-bold">Mật khẩu</label>
                    <input type="password" name="password" class="form-control input-custom " style="color: black !important;" required>
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label fw-bold">Trạng thái</label>
                    <select name="status" class="form-control input-custom " style="color: black !important;" required>
                        <option value="active">Đang hoạt động</option>
                        <option value="inactive">Bị khóa</option>
                    </select>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success">➕ Thêm Tài Khoản</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
