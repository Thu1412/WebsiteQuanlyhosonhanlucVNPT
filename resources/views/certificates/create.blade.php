@extends('layouts.app')
@section('content')

  <!-- Content Wrapper. Contains page content -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="form-container">
        <div class="card p-4 shadow-lg" style="border-radius: 10px; background-color: white;">
            <h2 class="text-red fw-bold" style="font-weight: bold;"><i class="fas fa-plus-circle"></i>THÊM MỚI CHỨNG CHỈ, CHỨNG NHẬN</h2>
            
        
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('certificates.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="nhansu_id" class="form-label fw-bold text-danger">Nhân sự</label>
            <select name="nhansu_id" class="form-control input-custom" required>
                <option value="">-- Chọn nhân sự --</option>
                @foreach ($nhansu as $nhansu)
                    <option value="{{ $nhansu->id }}">{{ $nhansu->hoten }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold text-danger">Trạng thái</label>
            <select name="status_id" class="form-control input-custom">
                <option value="2">Hoàn thành</option>
                <option value="5">Đang học</option>
                <option value="6">Đình chỉ</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold text-danger">Ngày bắt đầu</label>
            <input type="date" name="DateStart" class="form-control input-custom">
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold text-danger">Ngày kết thúc</label>
            <input type="date" name="DateEnd" class="form-control input-custom">
        </div>

        <div class="mb-3">
        <label class="form-label fw-bold text-danger">Tên Chứng Chỉ</label>
        <select name="DegreeCertificate" class="form-control input-custom" required>
            <option value="" disabled selected>Chọn chứng chỉ</option>
            <option value="Cử nhân">Cử nhân</option>
            <option value="Thạc sĩ">Thạc sĩ</option>
            <option value="Tiến sĩ">Tiến sĩ</option>
            <option value="Chứng chỉ nghề">Chứng chỉ nghề</option>
            <option value="Chứng chỉ chuyên môn">Chứng chỉ chuyên môn</option>
        </select>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold text-danger">Loại Chứng Chỉ</label>
                <select name="TypeCertificate" class="form-control input-custom" required>
                    <option value="" disabled selected>Chọn loại chứng chỉ</option>
                    <option value="Đại học">Đại học</option>
                    <option value="Sau đại học">Sau đại học</option>
                    <option value="Chuyên nghiệp">Chuyên nghiệp</option>
                    <option value="Nâng cao">Nâng cao</option>
                    <option value="Chứng chỉ ngắn hạn">Chứng chỉ ngắn hạn</option>
                </select>
            </div>

        <div class="mb-3">
            <label class="form-label fw-bold text-danger">Lĩnh vực</label>
            <input type="text" name="FieldCertificate" class="form-control input-custom">
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold text-danger">Cấp độ</label>
            <select name="LevelCertificate" class="form-control input-custom">
                <option value="" disabled selected>Chọn cấp độ</option>
                @foreach ($levels as $level)
                    <option value="{{ $level }}">{{ $level }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
        <label for="BasisTrainSelect" class="form-label fw-bold text-danger">Trường Đào Tạo:</label>
        <select id="BasisTrainSelect" name="BasisTrain" class="form-control input-custom">
                <option value="">Chọn Trường Đào Tạo</option>
            </select>
           
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold text-danger">Địa điểm đào tạo</label>
            <select name="LocationTrain" class="form-control input-custom">
                <option value="" disabled selected>Chọn địa điểm đào tạo</option>
                @foreach ($locations as $group => $items)
                    <optgroup label="{{ $group }}">
                        @foreach ($items as $location)
                            <option value="{{ $location }}">{{ $location }}</option>
                        @endforeach
                    </optgroup>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold text-danger">Xếp loại</label>
            <input type="text" name="Classification" class="form-control input-custom">
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold text-danger">Điểm số</label>
            <input type="number" step="0.1" name="Score" class="form-control input-custom">
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold text-danger">Ngày cấp chứng chỉ</label>
            <input type="date" name="DateCertificate" class="form-control input-custom">
        </div>

            <div class="mb-3">
            <label class="form-label fw-bold text-danger">Chứng chỉ quốc tế</label>
            <select class="form-control input-custom" name="InternationalCertificate">
                <option value="1">Có</option>
                <option value="0" selected>Không</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold text-danger">Được cử đi học</label>
            <select class="form-control input-custom" name="SentStudy">
                <option value="1">Có</option>
                <option value="0" selected>Không</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold text-danger">Tệp đính kèm</label>
            <input type="file" name="File" class="form-control input-custom">
        </div>

        <button type="submit" class="btn btn-success">Lưu</button>
    </form>
</div>
</div>
</div>
@endsection
