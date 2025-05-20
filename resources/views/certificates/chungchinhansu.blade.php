@extends('layouts.appuser')

@section('content')
<div class="content-wrapper">
    <div class="container py-4">
        <div class="card p-4 shadow-lg" style="border-radius: 10px; background-color: white;">
        
            <h2 class="text-red fw-bold text-center" style="font-weight: bold;">
                <i class="fas fa-graduation-cap"></i>THÔNG TIN HỌC VẤN & CHỨNG CHỈ
            </h2>
            
            <div class="form-container text-center">
                <!-- Hiển thị ảnh đại diện -->
                <img src="{{ asset('uploads/nhansu/' . basename($nhansu->hinhanh)) }}" 
                     class="rounded-circle" 
                     alt="Ảnh nhân viên" 
                     width="150" 
                     height="150">
                <h3 class="mt-3">{{ $nhansu->hoten }}</h3>
            </div>

            <!-- Hiển thị danh sách Chứng chỉ -->
            <h3 class="mt-4 text-success"><i class="fas fa-certificate"></i> Chứng Chỉ</h3>
            @if($certificates->isNotEmpty())
                @foreach($certificates as $certificate)
                <table class="table table-bordered mt-2">
                    <tr>
                        <th colspan="2" class="text-center bg-success text-white">
                            <i class="fas fa-award"></i> Chứng chỉ #{{ $loop->iteration }}
                        </th>
                    </tr>
                    <tr>
                        <th><i class="fas fa-hashtag"></i> ID</th>
                        <td>{{ $certificate->id }}</td>
                    </tr>
                    <tr>
                        <th><i class="fas fa-id-badge"></i> Tên chứng chỉ</th>
                        <td>{{ $certificate->DegreeCertificate }}</td>
                    </tr>
                    <tr>
                        <th><i class="fas fa-book"></i> Loại chứng chỉ</th>
                        <td>{{ $certificate->TypeCertificate }}</td>
                    </tr>
                    <tr>
                        <th><i class="fas fa-layer-group"></i> Lĩnh vực</th>
                        <td>{{ $certificate->FieldCertificate }}</td>
                    </tr>
                    <tr>
                        <th><i class="fas fa-chart-line"></i> Trình độ</th>
                        <td>{{ $certificate->LevelCertificate }}</td>
                    </tr>
                    <tr>
                        <th><i class="fas fa-university"></i> Trường đào tạo</th>
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
                        <th><i class="fas fa-sort-numeric-up"></i> Điểm số</th>
                        <td>{{ $certificate->Score }}</td>
                    </tr>
                    <tr>
                        <th><i class="fas fa-user-graduate"></i> Gửi đi học</th>
                        <td>{{ $certificate->SentStudy ? 'Có' : 'Không' }}</td>
                    </tr>
                    <tr>
                        <th><i class="fas fa-globe"></i> Chứng chỉ quốc tế</th>
                        <td>{{ $certificate->InternationalCertificate ? 'Có' : 'Không' }}</td>
                    </tr>
                    <tr>
                        <th><i class="fas fa-clock"></i> Ngày tạo</th>
                        <td>{{ date('d/m/Y', strtotime($certificate->created_at)) }}</td>
                    </tr>
                    <tr>
                        <th><i class="fas fa-history"></i> Ngày cập nhật</th>
                        <td>{{ date('d/m/Y', strtotime($certificate->updated_at)) }}</td>
                    </tr>
                    <tr>
                        <th><i class="fas fa-calendar-check"></i> Ngày cấp</th>
                        <td>{{ date('d/m/Y', strtotime($certificate->DateCertificate)) }}</td>
                    </tr>
                    <tr>
                        <th><i class="fas fa-file-alt"></i> File</th>
                        <td>
                            @if($certificate->File)
                                <a href="{{ asset($certificate->File) }}" target="_blank" class="btn btn-sm btn-info">
                                    <i class="fas fa-download"></i> Xem File
                                </a>
                            @else
                                Không có file
                            @endif
                        </td>
                    </tr>
                    
                </table>
                @endforeach
            @else
                <p class="text-center text-danger"><i class="fas fa-exclamation-circle"></i> Không có chứng chỉ.</p>
            @endif

            <div class="text-center">
                <a href="#" class="btn btn-primary mt-3">
                    <i class="fas fa-arrow-left"></i> Quay lại
                </a>
                <!-- Nút yêu cầu -->
                <a href="{{route('notifications.index')}}" class="btn btn-primary mt-3" style="background-color: #004080; border-color: #003366;">
                <i class="fas fa-edit"></i> Yêu Cầu Chỉnh Sửa
                </a>
<!-- Modal Yêu cầu -->

                
            </div>

        </div>
    </div>
</div>
@endsection
