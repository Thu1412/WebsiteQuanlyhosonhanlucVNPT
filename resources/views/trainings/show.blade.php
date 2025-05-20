@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container py-4">
        <div class="card p-4 shadow-lg" style="border-radius: 10px; background-color: white;">
    <h2 class="text-red fw-bold text-center" style="font-weight: bold;">CHI TIẾT ĐÀO TẠO</h2>
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
            <table class="table table-bordered mt-4">
                <style>
                    th {
                        color: #0056b3 !important; /* Màu xanh dương đậm cho tiêu đề */
                        text-align: left !important;
                    }
                    tr:hover {
                        background-color:rgb(241, 152, 78) !important; /* Màu vàng nhạt khi hover */
                    }
                </style>
                <tr>
                    <th><i class="fas fa-id-badge"></i> ID</th>
                    <td>{{ $training->id }}</td>
                </tr>
                <tr>
                    <th><i class="fas fa-user"></i> Nhân Sự</th>
                    <td>{{ $training->nhansu->hoten ?? 'Không xác định' }}</td>
                </tr>
                <tr>
                    <th><i class="fas fa-info-circle"></i> Trạng Thái</th>
                    <td>{{ $training->status->name ?? 'Không xác định' }}</td>
                </tr>
                <tr>
                    <th><i class="fas fa-calendar-alt"></i> Ngày Bắt Đầu</th>
                    <td>{{ $training->DateStart }}</td>
                </tr>
                <tr>
                    <th><i class="fas fa-calendar-check"></i> Ngày Kết Thúc</th>
                    <td>{{ $training->DateEnd }}</td>
                </tr>
                <tr>
                    <th><i class="fas fa-building"></i> Đơn Vị</th>
                    <td>{{ $training->Unit }}</td>
                </tr>
                <tr>
                    <th><i class="fas fa-briefcase"></i> Chức Danh</th>
                    <td>{{ $training->JobTitle }}</td>
                </tr>
                <tr>
                    <th><i class="fas fa-book"></i> Khóa Đào Tạo</th>
                    <td>{{ $training->CourseTrain }}</td>
                </tr>
                <tr>
                    <th><i class="fas fa-graduation-cap"></i> Hình Thức Đào Tạo</th>
                    <td>{{ $training->OrganizeForm }}</td>
                </tr>
                <tr>
                    <th><i class="fas fa-school"></i> Đơn Vị Đào Tạo</th>
                    <td>{{ $training->UnitTrain }}</td>
                </tr>
                <tr>
                    <th><i class="fas fa-file-alt"></i> Nội Dung Cam Kết</th>
                    <td>{{ $training->ContentCommit }}</td>
                </tr>
                <tr>
                    <th><i class="fas fa-chart-line"></i> Kết Quả Đào Tạo</th>
                    <td>{{ $training->ResultTrain }}</td>
                </tr>
                <tr>
                    <th><i class="fas fa-book-reader"></i> Kết Quả Môn Học</th>
                    <td>{{ $training->ResultSubject }}</td>
                </tr>
                <tr>
                    <th><i class="fas fa-info-circle"></i> Trạng Thái</th>
                    <td>{{ $training->Status }}</td>
                </tr>
                <tr>
                    <th><i class="fas fa-star"></i> Điểm Số</th>
                    <td>{{ $training->Score }}</td>
                </tr>
                <tr>
                    <th><i class="fas fa-coins"></i> Chi Phí Đào Tạo</th>
                    <td>{{ number_format($training->CostTrain) }} VNĐ</td>
                </tr>
                <tr>
                    <th><i class="fas fa-hourglass-start"></i> Thời Gian Cam Kết</th>
                    <td>{{ $training->TimeCommit }} tháng</td>
                </tr>
                <tr>
                    <th><i class="fas fa-hourglass-half"></i> Thời Gian Cam Kết Còn Lại</th>
                    <td>{{ $training->TimeCommitRemain }} tháng</td>
                </tr>
                <tr>
                    <th><i class="fas fa-certificate"></i> Chứng Chỉ</th>
                    <td>{{ $training->IssueCertificate ? 'Có' : 'Không' }}</td>
                </tr>
                <tr>
                    <th><i class="fas fa-file-contract"></i> Hợp Đồng</th>
                    <td>{{ $training->Contract }}</td>
                </tr>
               
            </table>
            <div class="text-center">
                <a href="{{ route('trainings.index') }}" class="btn btn-primary">
                    <i class="fas fa-arrow-left"></i> Quay lại danh sách
                </a>
    </div>
</div>
@endsection
