@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container py-4">
        <div class="card p-4 shadow-lg" style="border-radius: 10px; background-color: white;">
    
        
        <h2 class="text-red fw-bold text-center" style="font-weight: bold;">CHI TIẾT TRÌNH ĐỘ HỌC VẤN</h2>
            <div class="form-container text-center">
                <!-- Hiển thị ảnh đại diện -->
                <img src="{{ asset('uploads/nhansu/' . basename($nhansu->hinhanh)) }}" 
                     class="rounded-circle" 
                     alt="Ảnh nhân viên" 
                     width="150" 
                     height="150">
                <h3 class="mt-3">{{ $education->nhansu->hoten }}</h3>
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
                        <th><i class="fas fa-id-badge"> ID</th>
                        <td >{{ $education->id ?? 'Không xác định' }}</td>
                    </tr>
                    
                    <tr>
                        <th><i class="fas fa-check-circle"> Trạng thái</th>
                        <td>
                            @php
                                $statusMap = [
                                    1 => 'Đã tốt nghiệp',
                                    2 => 'Đang học',
                                    3 => 'Bị đình chỉ',
                                ];
                            @endphp
                            {{ $statusMap[$education->status_id] ?? 'Không xác định' }}
                        </td>
                    </tr>
                    <tr>
                        <th><i class="fas fa-calendar-alt"></i> Ngày bắt đầu</th>
                        <td>{{ $education->DateStart }}</td>
                    </tr>
                    <tr>
                        <th><i class="fas fa-calendar-check"></i> Ngày kết thúc</th>
                        <td>{{ $education->DateEnd }}</td>
                    </tr>
                    <tr>
                        <th><i class="fas fa-file"></i> File</th>
                        <td>
                            @if ($education->File)
                                <a href="{{ asset($education->File) }}" target="_blank" class="btn btn-sm btn-info"><i class="fas fa-download" ></i>Xem File</a>
                            @else
                                Không có file
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th><i class="fas fa-university"></i> Trường Đào Tạo</th>
                        <td>{{ $education->BasisTrain }}</td>
                    </tr>
                    <tr>
                        <th><i class="fas fa-book"></i> Chương Trình Đào Tạo</th>
                        <td>{{ $education->StandardTrain }}</td>
                    </tr>

                    <tr>
                        <th><i class="fas fa-graduation-cap"></i> Ngành Đào Tạo</th>
                        <td>{{ $education->FormTrain }}</td>
                    </tr>

                    <tr>
                        <th><i class="fas fa-award"></i> Loại đào tạo</th>
                        <td>{{ $education->TypeTrain }}</td>
                    </tr>

                    <tr>
                        <th><i class="fas fa-medal"></i> Xếp loại bằng cấp</th>
                        <td>{{ $education->DegreeClassific }}</td>
                    </tr>

                    <tr>
                        <th><i class="fas fa-certificate"></i> Danh hiệu đào tạo</th>
                        <td>{{ $education->TitleTrain }}</td>
                    </tr>

                    <tr>
                        <th><i class="fas fa-layer-group"></i> Bậc đào tạo</th>
                        <td>{{ $education->EducationLevel }}</td>
                    </tr>

                    <tr>
                        <th><i class="fas fa-user-check"></i> Gửi đi học</th>
                        <td>
                            @php
                                $sentStudyMap = [
                                    1 => 'Có',
                                    0 => 'Không',
                                ];
                            @endphp
                            {{ $sentStudyMap[$education->SentStudy] ?? 'Không xác định' }}
                        </td>
                    </tr>

                    <tr>
                        <th><i class="fas fa-clock"></i> Ngày tạo</th>
                        <td>{{ $education->created_at }}</td>
                    </tr>

                    <tr>
                        <th><i class="fas fa-history"></i> Ngày cập nhật</th>
                        <td>{{ $education->updated_at }}</td>
                    </tr>
                </table>
                <a href="{{ route('educations.index') }}" class="btn btn-primary mt-3" style="background-color: #004080; border-color: #003366;">Quay lại</a>
            </div>

        </div>
    </div>
        
    
@endsection