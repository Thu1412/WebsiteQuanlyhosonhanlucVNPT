@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container py-4">
        <div class="card p-4 shadow-lg" style="border-radius: 10px; background-color: white;">
        
    <h2 class="text-red fw-bold text-center" style="font-weight: bold;">CHI TIẾT THAM GIA DỰ ÁN</h2>
            <div class="form-container text-center">
                <!-- Hiển thị ảnh đại diện -->
                <img src="{{ asset('uploads/nhansu/' . basename($nhansu->hinhanh)) }}" 
                     class="rounded-circle" 
                     alt="Ảnh nhân viên" 
                     width="150" 
                     height="150">
                <h3 class="mt-3">{{ $joinProject->nhansu->hoten }}</h3>
            </div>
            
            <table class="table table-bordered mt-4">
                <style>
                    th {
                        color: #0056b3 !important; /* Màu xanh dương đậm cho tiêu đề */
                        text-align: left !important;
                        width: 30%;
                    }
                    td {
                        width: 70%;
                    }
                    tr:hover {
                        background-color:rgb(241, 152, 78) !important; /* Màu vàng nhạt khi hover */
                    }
                </style>
                
                <tr>
                    <th><i class="fas fa-id-badge"></i> ID</th>
                    <td>{{ $joinProject->id }}</td>
                </tr>
                <tr>
                    <th><i class="fas fa-check-circle"></i> Trạng thái</th>
                   
                    <td>
                        {{ isset($statusItem) ? $statusItem->name : 'Không xác định' }}
                    </td>
                </tr>
                <tr>
                    <th><i class="fas fa-calendar-alt"></i> Ngày bắt đầu</th>
                    <td>{{ $joinProject->DateStart }}</td>
                </tr>
                <tr>
                    <th><i class="fas fa-calendar-check"></i> Ngày kết thúc</th>
                    <td>{{ $joinProject->DateEnd }}</td>
                </tr>
                <tr>
                    <th><i class="fas fa-project-diagram"></i> Tên dự án</th>
                    <td>{{ $joinProject->ProductName }}</td>
                </tr>
                <tr>
                    <th><i class="fas fa-align-left"></i> Mô tả</th>
                    <td>{{ $joinProject->Description }}</td>
                </tr>
                
                <tr>
                    <th><i class="fas fa-clock"></i> Ngày tạo</th>
                    <td>{{ $joinProject->created_at }}</td>
                </tr>
                <tr>
                    <th><i class="fas fa-history"></i> Ngày cập nhật</th>
                    <td>{{ $joinProject->updated_at }}</td>
                </tr>
            </table>
            <a href="{{ route('join-projects.index') }}" class="btn btn-primary mt-3" style="background-color: #004080; border-color: #003366;">Quay lại danh sách</a>
        </div>
    </div>
</div>
@endsection
