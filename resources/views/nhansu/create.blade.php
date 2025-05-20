@extends('layouts.app')
@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="form-container">
    <div class="card p-4 shadow-lg" style="border-radius: 10px; background-color: white;">
            <h2 class="text-red fw-bold" style="font-weight: bold;"><i class="fas fa-plus-circle"></i>THÊM MỚI NHÂN SỰ</h2>
            <form action="{{ route('nhansu.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
            <label for="hoten" class="form-label fw-bold " style="color: black !important;">Họ và tên</label>
            <input type="text" name="hoten" class="form-control input-custom " style="color: black !important;" required>
        </div>
        <div class="row">
            <label for="gioitinh" style="color: black !important;">Giới tính</label>
            <select name="gioitinh" class="form-control input-custom " required>
                <option value="male">Nam</option>
                <option value="female">Nữ</option>
            </select>
        </div>
        <div class="row">
            <label for="ngaysinh" style="color: black !important;">Ngày sinh</label>
            <input type="date" name="ngaysinh" class="form-control input-custom " style="color: black !important;" required>
        </div>
        <div class="row">
        <label for="sodienthoai">Số điện thoại</label>
                    <input type="text" name="sodienthoai" class="form-control input-custom " style="color: black !important;" required>
                    @error('sodienthoai')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
        </div>
        <div class="row">
    <label for="hinhanh" style="color: black !important;">Hình ảnh</label>
    <input type="file" name="hinhanh" class="form-control input-custom" style="color: black !important;" accept="image/*" required>
</div>

        <div class="row">
        <label for="email">Email</label>
                    <input type="email" name="email" class="form-control input-custom" style="color: black !important;" required>
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
        </div>
        <div class="row">
            <label for="diachi" style="color: black !important;">Địa chỉ</label>
            <input type="text" name="diachi" class="form-control input-custom " style="color: black !important;" required>
        </div>
        <div class="row button-container">
    <button type="submit" class="btn btn-success">Thêm Nhân sự</button>
</div>
            </form>
            
        </div>
        
    </div>
   
</div>

        


@endsection