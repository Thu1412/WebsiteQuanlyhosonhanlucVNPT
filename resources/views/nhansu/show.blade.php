@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container py-4">
        <div class="card p-4 shadow-lg" style="border-radius: 10px; background-color: white;">
            
        <h2 class="text-red fw-bold text-center" style="font-weight: bold;">
            THÔNG TIN NHÂN SỰ
        </h2>

        
                <div class="form-container text-center">
                    <!-- Kiểm tra xem nhân sự có tồn tại không -->
                    @if ($nhansu->hinhanh)
                        <img src="{{ asset('uploads/nhansu/' . basename($nhansu->hinhanh) ?? 'default.png') }}" 
                            class="rounded-circle" 
                            alt="Ảnh nhân viên" 
                            width="150" 
                            height="150">
                        <h3 class="mt-3">{{ $nhansu->hoten }}</h3>
                    @else
                        <p class="text-danger">Không có thông tin nhân sự</p>
                    @endif
                </div>

                <table class="table table-bordered">
                    <style>
                        th {
                            color: #0056b3 !important; /* Màu xanh dương đậm cho tiêu đề */
                            text-align: left !important;
                        }
                        tr:hover {
                            background-color:rgb(241, 152, 78) !important; 
                        }
                    </style>

                    @if ($nhansu)
                        <tr>
                            <th>ID</th>
                            <td>{{ $nhansu->id }}</td>
                        </tr>
                        <tr>
                            <th>Họ tên</th>
                            <td>{{ $nhansu->hoten }}</td>
                        </tr>
                        <tr>
                            <th>Giới tính</th>
                            <td>{{ $nhansu->gioitinh == 'male' ? 'Nam' : 'Nữ' }}</td>
                        </tr>
                        <tr>
                            <th>Ngày sinh</th>
                            <td>{{ $nhansu->ngaysinh }}</td>
                        </tr>
                        <tr>
                            <th>Số điện thoại</th>
                            <td>{{ $nhansu->sodienthoai }}</td>
                        </tr>
                       
                        <tr>
                            <th>Email</th>
                            <td>{{ $nhansu->email }}</td>
                        </tr>
                        <tr>
                            <th>Địa chỉ</th>
                            <td>{{ $nhansu->diachi }}</td>
                        </tr>
                        <tr>
                            <th>Ngày tạo</th>
                            <td>{{ $nhansu->created_at }}</td>
                        </tr>
                        <tr>
                            <th>Ngày cập nhật</th>
                            <td>{{ $nhansu->updated_at }}</td>
                        </tr>
                        <tr>
                            <th>User ID</th>
                            <td>{{ $nhansu->user_id }}</td>
                        </tr>
                    @else
                        <tr>
                            <td colspan="2" class="text-center text-danger">Không có dữ liệu nhân sự</td>
                        </tr>
                    @endif
                </table>

                <a href="{{ route('nhansu.index') }}" class="btn btn-primary mt-3" style="background-color: #004080; border-color: #003366;">Quay lại</a>
            
        </div>
    </div>
</div>
@endsection
