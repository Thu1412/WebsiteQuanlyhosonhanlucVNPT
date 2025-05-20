@extends('layouts.appuser')

@section('content')
<div class="content-wrapper">
    <div class="container py-4">
        <div class="card p-4 shadow-lg" style="border-radius: 10px; background-color: white;">
        
            <h2 class="text-red fw-bold text-center" style="font-weight: bold;">
                <i class="fas fa-graduation-cap"></i> THÔNG TIN THAM GIA DỰ ÁN
            </h2>
            @if ($joinProjects->isEmpty())
                        <div class="alert alert-warning">Không có thông tin đào tạo.</div>
            @endif
            <div class="form-container text-center">
                <!-- Hiển thị ảnh đại diện -->
                <img src="{{ asset('uploads/nhansu/' . basename($nhansu->hinhanh)) }}" 
                     class="rounded-circle" 
                     alt="Ảnh nhân viên" 
                     width="150" 
                     height="150">
                <h3 class="mt-3">{{ $nhansu->hoten }}</h3>
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
                
                @foreach($joinProjects as $project)
                    <tr>
                        <th><i class="fas fa-id-badge"></i> ID</th>
                        <td>{{ $project->id }}</td>
                    </tr>
                    <tr>
                        <th><i class="fas fa-check-circle"></i> Trạng thái</th> 
                        <td>{{ isset($project->status) ? $project->status->name : 'Không xác định' }}</td>
                    </tr>
                    <tr>
                        <th><i class="fas fa-calendar-alt"></i> Ngày bắt đầu</th>
                        <td>{{ $project->DateStart }}</td>
                    </tr>
                    <tr>
                        <th><i class="fas fa-calendar-check"></i> Ngày kết thúc</th>
                        <td>{{ $project->DateEnd }}</td>
                    </tr>
                    <tr>
                        <th><i class="fas fa-project-diagram"></i> Tên dự án</th>
                        <td>{{ $project->ProductName }}</td>
                    </tr>
                    <tr>
                        <th><i class="fas fa-align-left"></i> Mô tả</th>
                        <td>{{ $project->Description }}</td>
                    </tr>
                    @endforeach

            </table>
            <div class="text-center">
                <a href="#" class="btn btn-primary mt-3">
                    <i class="fas fa-arrow-left"></i> Quay lại
                </a>
                <a href="{{route('notifications.index')}}" class="btn btn-primary mt-3" style="background-color: #004080; border-color: #003366;">Yêu Cầu Chỉnh Sửa</a>
            </div>
        </div>
    </div>
</div>
@endsection
