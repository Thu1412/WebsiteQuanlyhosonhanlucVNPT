@extends('layouts.appuser')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
    <div class="container mt-4">
    <div class="card shadow-lg">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <img src="{{ asset(Auth::user()->nhansu->hinhanh ?? 'dist/img/default-avatar.jpg') }}" 
        
                     class="rounded-circle border" width="80">
                <div class="ms-3">
                    <h4 class="fw-bold">{{ auth()->user()->name }}</h4>
                    <p class="text-muted">{{ auth()->user()->email }}</p>
                </div>
            </div>

            <hr>

            <!-- Form chỉnh sửa hồ sơ -->
            

            <!-- Hiển thị thông tin -->
            <ul class="list-group list-group-flush" id="profileInfo">
                <li class="list-group-item"><strong>🧑 Giới tính:</strong>  {{ Auth::user()->nhansu->gioitinh == 'male' ? 'Nam' : 'Nữ' ?? 'Chưa cập nhật' }}</li>
                <li class="list-group-item"><strong>🎂 Ngày sinh:</strong> {{ Auth::user()->nhansu->ngaysinh  ?? 'Chưa cập nhật' }}</li>
                <li class="list-group-item"><strong>📞 Số điện thoại:</strong> {{ Auth::user()->nhansu->sodienthoai ?? 'Chưa cập nhật' }}</li>
                <li class="list-group-item"><strong>📍Email:</strong>{{ Auth::user()->nhansu->email ?? 'Chưa cập nhật' }}</li>
                <li class="list-group-item"><strong>🏠 Chỗ ở hiện tại:</strong> {{ Auth::user()->nhansu->diachi ?? 'Chưa cập nhật' }}</li>
            </ul>

         <div class="mt-3 text-end">
            <a href="{{ route('profile.edit') }}" class="btn btn-primary">✏️ Chỉnh sửa hồ sơ</a>
        </div>
        </div>
    </div>
</div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection