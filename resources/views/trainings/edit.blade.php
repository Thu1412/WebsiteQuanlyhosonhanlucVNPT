@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="form-container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 style="font-weight: bold;">CHỈNH SỬA KHÓA ĐÀO TẠO</h2>
        </div>

        <form action="{{ route('trainings.update', $training->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label" style="font-weight: bold; color: black;">Từ Ngày</label>
                <input type="date" class="form-control input-custom " style="color: black !important;" name="DateStart" value="{{ old('DateStart', $training->DateStart) }}" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label" style="font-weight: bold; color: black;">Đến Ngày</label>
                <input type="date" class="form-control input-custom " style="color: black !important;" name="DateEnd" value="{{ old('DateEnd', $training->DateEnd) }}" required>
            </div>
            </div>
            
            <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label" style="font-weight: bold; color: black;">Đơn Vị Nội Bộ Đào Tạo</label>
                <input type="text" class="form-control input-custom " style="color: black !important;" name="UnitTrain" value="{{ old('UnitTrain', $training->UnitTrain) }}" required>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label" style="font-weight: bold; color: black;">Đơn Vị Bên Ngoài Đào Tạo</label>
                <input type="text" class="form-control input-custom " style="color: black !important;" name="Unit" value="{{ old('Unit', $training->Unit) }}">
            </div>
            </div>
            <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label" style="font-weight: bold; color: black;">Chức Danh Công Việc</label>
                <input type="text" class="form-control input-custom " style="color: black !important;" name="JobTitle" value="{{ old('JobTitle', $training->JobTitle) }}" required>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label" style="font-weight: bold; color: black;">Tên Khóa Đào Tạo</label>
                <input type="text" class="form-control input-custom " style="color: black !important;" name="CourseTrain" value="{{ old('CourseTrain', $training->CourseTrain) }}" required>
            </div>
            </div>
            <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label" style="font-weight: bold; color: black;">Hình Thức Tổ Chức</label>
                <select class="form-control input-custom " style="color: black !important;" name="OrganizeForm">
                    <option value="Trực Tuyến" {{ $training->OrganizeForm == 'Trực Tuyến' ? 'selected' : '' }}>Trực Tuyến</option>
                    <option value="Tại Chỗ" {{ $training->OrganizeForm == 'Tại Chỗ' ? 'selected' : '' }}>Tại Chỗ</option>
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label" style="font-weight: bold; color: black;">Cam Kết Nội Dung Đào Tạo</label>
                <textarea class="form-control input-custom " style="color: black !important;" name="ContentCommit">{{ old('ContentCommit', $training->ContentCommit) }}</textarea>
            </div>
            </div>
            <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label" style="font-weight: bold; color: black;">Kết Quả Đào Tạo</label>
                <input type="text" class="form-control input-custom " style="color: black !important;" name="ResultTrain" value="{{ old('ResultTrain', $training->ResultTrain) }}">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label" style="font-weight: bold; color: black;">Kết Quả Môn Học</label>
                <input type="text" class="form-control input-custom " style="color: black !important;" name="ResultSubject" value="{{ old('ResultSubject', $training->ResultSubject) }}">
            </div>
            </div>
            <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label" style="font-weight: bold; color: black;">Trạng Thái Đào Tạo</label>
                <input type="text" class="form-control input-custom " style="color: black !important;" name="Status" value="{{ old('Status', $training->Status) }}">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label" style="font-weight: bold; color: black;">Điểm Đào Tạo</label>
                <input type="number" class="form-control input-custom " style="color: black !important;" name="Score" value="{{ old('Score', $training->Score) }}">
            </div>
            </div>
            <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label" style="font-weight: bold; color: black;">Chi Phí Đào Tạo</label>
                <input type="number" class="form-control input-custom " style="color: black !important;" name="CostTrain" step="0.01" value="{{ old('CostTrain', $training->CostTrain) }}">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label" style="font-weight: bold; color: black;">Thời Gian Cam Kết</label>
                <input type="number" class="form-control input-custom " style="color: black !important;" name="TimeCommit" value="{{ old('TimeCommit', $training->TimeCommit) }}">
            </div>
            </div>
            <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label" style="font-weight: bold; color: black;">Thời Gian Cam Kết Còn Lại</label>
                <input type="number" class="form-control input-custom " style="color: black !important;" name="TimeCommitRemain" value="{{ old('TimeCommitRemain', $training->TimeCommitRemain) }}">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label" style="font-weight: bold; color: black;">Cấp Chứng Chỉ</label>
                <select class="form-control input-custom " style="color: black !important;" name="IssueCertificate">
                    <option value="1" {{ $training->IssueCertificate == 1 ? 'selected' : '' }}>Có</option>
                    <option value="0" {{ $training->IssueCertificate == 0 ? 'selected' : '' }}>Không</option>
                </select>
            </div>
            </div>
            <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label" style="font-weight: bold; color: black;">Hợp Đồng Đào Tạo</label>
                <input type="text" class="form-control input-custom " style="color: black !important;" name="Contract" value="{{ old('Contract', $training->Contract) }}">
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label" style="font-weight: bold; color: black;">Trạng Thái</label>
                <select class="form-control input-custom " style="color: black !important;" name="status_id">
                    <option value="1" {{ $training->status_id == 1 ? 'selected' : '' }}>Hoạt động</option>
                    <option value="0" {{ $training->status_id == 0 ? 'selected' : '' }}>Ngừng hoạt động</option>
                </select>
            </div>
            </div>
            <div class="row button-container">
                <button type="submit" class="btn btn-success">Cập Nhật</button>
                <a href="{{ route('trainings.index') }}" class="btn btn-secondary">Quay Lại</a>
            </div>
            
        </form>
    </div>
</div>
@endsection
