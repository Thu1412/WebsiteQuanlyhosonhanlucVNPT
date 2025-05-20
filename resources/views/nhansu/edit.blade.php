@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="form-container">
        <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="text-center text-danger fw-bold">CHỈNH SỬA NHÂN SỰ</h2>
        </div>
            

            <form action="{{ route('nhansu.update', $nhansu->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label fw-bold">Họ tên:</label>
                    <input type="text" name="hoten" class="form-control input-custom " style="color: black !important;" value="{{ $nhansu->hoten }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Giới tính:</label>
                    <select name="gioitinh" class="form-control input-custom " style="color: black !important;">
                        <option value="male" {{ $nhansu->gioitinh == 'male' ? 'selected' : '' }}>Nam</option>
                        <option value="female" {{ $nhansu->gioitinh == 'female' ? 'selected' : '' }}>Nữ</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Ngày sinh:</label>
                    <input type="date" name="ngaysinh" class="form-control input-custom " style="color: black !important;" value="{{ $nhansu->ngaysinh }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Số điện thoại:</label>
                    <input type="text" name="sodienthoai" class="form-control input-custom " style="color: black !important;" value="{{ $nhansu->sodienthoai }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Email:</label>
                    <input type="email" name="email" class="form-control input-custom " style="color: black !important;" value="{{ $nhansu->email }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Địa chỉ:</label>
                    <input type="text" name="diachi" class="form-control input-custom " style="color: black !important;" value="{{ $nhansu->diachi }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Ảnh đại diện hiện tại:</label><br>
                    @if ($nhansu->hinhanh)
                <img src="{{ asset('uploads/nhansu/' . basename($nhansu->hinhanh)) }}" alt="Hình ảnh" width="100">

                @else
                    Không có ảnh
                @endif
                  <!--  @if (Str::startsWith($nhansu->hinhanh, 'uploads/'))
                    <img src="{{ asset('uploads/nhansu/' . $nhansu->hinhanh) }}" alt="Hình ảnh nhân sự" width="100">

                    @else
                        <img src="{{ asset('storage/' . $nhansu->hinhanh) }}" alt="Hình ảnh nhân sự" width="100">
                    @endif-->
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Tải lên ảnh mới (nếu có):</label>
                    <input type="file" name="hinhanh" class="form-control input-custom " style="color: black !important;">
                </div>

                <button type="submit" class="btn btn-success">Lưu thay đổi</button>
                <a href="{{ route('nhansu.index') }}" class="btn btn-secondary">Hủy</a>
            </form>
        </div>
    </div>
</div>
@endsection