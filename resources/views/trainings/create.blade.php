@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="form-container">
    <div class="card p-4 shadow-lg" style="border-radius: 10px; background-color: white;">
    <h2 class="text-red fw-bold" style="font-weight: bold;"><i class="fas fa-plus-circle"></i>THÊM MỚI KHÓA ĐÀO TẠO</h2>
               
        </div>

        
                <form action="{{ route('trainings.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label"><i class="fas fa-user"></i> Nhân Sự</label>
                            <select class="form-control input-custom " style="color: black !important;" name="nhansu_id" required>
                                <option value="">Chọn Nhân Sự</option>
                                @foreach($nhansu as $ns)
                                    <option value="{{ $ns->id }}">{{ $ns->hoten }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label"><i class="fas fa-info-circle"></i> Trạng Thái</label>
                            <select class="form-control input-custom " style="color: black !important;" name="status_id" required>
                                <option value="">Chọn Trạng Thái</option>
                                @foreach($status as $status)
                                    <option value="{{ $status->id }}">{{ $status->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label"><i class="fas fa-calendar-alt"></i> Ngày Bắt Đầu</label>
                            <input type="date" class="form-control input-custom " style="color: black !important;" name="DateStart" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label"><i class="fas fa-calendar-check"></i> Ngày Kết Thúc</label>
                            <input type="date" class="form-control input-custom " style="color: black !important;" name="DateEnd" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><i class="fas fa-building"></i> Đơn Vị</label>
                        <input type="text" class="form-control input-custom " style="color: black !important;" name="Unit" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label"><i class="fas fa-briefcase"></i> Chức Danh</label>
                            <input type="text" class="form-control input-custom " style="color: black !important;" name="JobTitle" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label"><i class="fas fa-book"></i> Khóa Đào Tạo</label>
                            <input type="text" class="form-control input-custom " style="color: black !important;" name="CourseTrain" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><i class="fas fa-graduation-cap"></i> Hình Thức Đào Tạo</label>
                        <input type="text" class="form-control input-custom " style="color: black !important;" name="OrganizeForm" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><i class="fas fa-university"></i> Đơn Vị Đào Tạo</label>
                        <input type="text" class="form-control input-custom " style="color: black !important;" name="UnitTrain" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><i class="fas fa-file-contract"></i> Nội Dung Cam Kết</label>
                        <textarea class="form-control input-custom " style="color: black !important;" name="ContentCommit" rows="3" required></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label"><i class="fas fa-trophy"></i> Kết Quả Đào Tạo</label>
                            <input type="text" class="form-control input-custom " style="color: black !important;" name="ResultTrain" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label"><i class="fas fa-tasks"></i> Kết Quả Môn Học</label>
                            <input type="text" class="form-control input-custom " style="color: black !important;" name="ResultSubject" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label"><i class="fas fa-star"></i> Điểm Số</label>
                            <input type="number" class="form-control input-custom " style="color: black !important;" name="Score" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label"><i class="fas fa-money-bill-wave"></i> Chi Phí Đào Tạo</label>
                            <input type="number" class="form-control input-custom " style="color: black !important;" name="CostTrain" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label"><i class="fas fa-clock"></i> Thời Gian Cam Kết</label>
                            <input type="number" class="form-control input-custom " style="color: black !important;" name="TimeCommit" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label"><i class="fas fa-hourglass-half"></i> Thời Gian Cam Kết Còn Lại</label>
                            <input type="number" class="form-control input-custom " style="color: black !important;" name="TimeCommitRemain" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><i class="fas fa-certificate"></i> Chứng Chỉ</label>
                        <select class="form-control input-custom " style="color: black !important;" name="IssueCertificate" required>
                            <option value="1">Có</option>
                            <option value="0">Không</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><i class="fas fa-file-signature"></i> Hợp Đồng</label>
                        <input type="text" class="form-control input-custom " style="color: black !important;" name="Contract" required>
                    </div>

                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Lưu</button>
                    <a href="{{ route('trainings.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Quay Lại</a>
                </form>
            
    </div>
</div>
@endsection