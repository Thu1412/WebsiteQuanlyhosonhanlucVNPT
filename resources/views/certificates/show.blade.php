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
                     <h3 class="mt-3">{{ $certificate->nhansu ? $certificate->nhansu->hoten : 'Không có thông tin' }}</h3>
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
                    <td>{{ $certificate->id }}</td>
                </tr>
                <tr>
                    <th><i class="fas fa-check-circle"></i> Trạng thái</th>
                    <td>{{ $certificate->status ? $certificate->status->name : 'Không xác định' }}</td>
                </tr>
                <tr>
                    <th><i class="fas fa-calendar-alt"></i> Ngày bắt đầu</th>
                    <td>{{ date('d/m/Y', strtotime($certificate->DateStart)) }}</td>
                </tr>
                <tr>
                    <th><i class="fas fa-calendar-check"></i> Ngày kết thúc</th>
                    <td>{{ date('d/m/Y', strtotime($certificate->DateEnd)) }}</td>
                </tr>
                <tr>
                    <th><i class="fas fa-certificate"></i> Tên chứng chỉ</th>
                    <td>{{ $certificate->DegreeCertificate }}</td>
                </tr>
                <tr>
                    <th><i class="fas fa-tags"></i> Loại chứng chỉ</th>
                    <td>{{ $certificate->TypeCertificate }}</td>
                </tr>
                
                <tr>
                    <th><i class="fas fa-book"></i> Lĩnh vực</th>
                    <td>{{ $certificate->FieldCertificate }}</td>
                </tr>
                <tr>
                    <th><i class="fas fa-graduation-cap"></i> Trình độ</th>
                    <td>{{ $certificate->LevelCertificate }}</td>
                </tr>
                <tr>
                    <th><i class="fas fa-university"></i> Cơ sở đào tạo</th>
                    <td>{{ $certificate->BasisTrain }}</td>
                </tr>
                <tr>
                    <th><i class="fas fa-map-marker-alt"></i> Địa điểm đào tạo</th>
                    <td>{{ $certificate->LocationTrain }}</td>
                </tr>
                <tr>
                    <th><i class="fas fa-star"></i> Xếp loại</th>
                    <td>{{ $certificate->Classification }}</td>
                </tr>
                <tr>
                    <th><i class="fas fa-chart-line"></i> Điểm số</th>
                    <td>{{ $certificate->Score }}</td>
                </tr>
                <tr>
                    <th><i class="fas fa-paper-plane"></i> Gửi đi học</th>
                    <td>{{ $certificate->SentStudy ? 'Có' : 'Không' }}</td>
                </tr>
                <tr>
                    <th><i class="fas fa-globe"></i> Chứng chỉ quốc tế</th>
                    <td>{{ $certificate->InternationalCertificate ? 'Có' : 'Không' }}</td>
                </tr>
                <tr>
                    <th><i class="fas fa-calendar-day"></i> Ngày cấp chứng chỉ</th>
                    <td>{{ date('d/m/Y', strtotime($certificate->DateCertificate)) }}</td>
                </tr>
                <tr>
                    <th><i class="fas fa-clock"></i> Ngày tạo</th>
                    <td>{{ $certificate->created_at->format('d/m/Y H:i') }}</td>
                </tr>
                <tr>
                    <th><i class="fas fa-history"></i> Ngày cập nhật</th>
                    <td>{{ $certificate->updated_at->format('d/m/Y H:i') }}</td>
                </tr>
                <tr>
                    <th><i class="fas fa-file-alt"></i> File đính kèm</th>
                    <td>
                        @if($certificate->File)
                            <a href="{{ asset('uploads/certificates/' . basename($certificate->File)) }}" target="_blank" class="btn btn-sm btn-info">
                                <i class="fas fa-download"></i> Xem file
                            </a>
                        @else
                            Không có file
                        @endif
                    </td>
                </tr>
            </table>
            <div class="text-center">
                <a href="{{ route('certificates.index') }}" class="btn btn-primary">
                    <i class="fas fa-arrow-left"></i> Quay lại danh sách
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
