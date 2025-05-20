@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="form-container">
    <div class="card p-4 shadow-lg" style="border-radius: 10px; background-color: white;">
            <h2 class="text-red fw-bold" style="font-weight: bold;">CHỈNH SỬA CHỨNG CHỈ, CHỨNG NHẬN</h2>

    <form action="{{ route('certificates.update', $certificate->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            
            <div class="col-md-6 mb-3">
                <label class="form-label">Trạng thái</label>
                <select class="form-control input-custom" name="status_id">
                    <option  {{ $certificate->status_id == 2 ? 'selected' : '' }}>Hoàn Thành</option>
                    <option  {{ $certificate->status_id == 5 ? 'selected' : '' }}>Đang học</option>
                    <option  {{ $certificate->status_id == 6 ? 'selected' : '' }}>Đình chỉ</option>
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Nhân sự</label>
                <input type="text" class="form-control input-custom" 
                    value="{{ $certificate->nhansu ? $certificate->nhansu->hoten : 'Không xác định' }}" 
                    disabled>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Ngày cấp</label>
                <input type="date" class="form-control input-custom" name="DateStart" value="{{ $certificate->DateStart }}">
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Ngày hết hạn</label>
                <input type="date" class="form-control input-custom" name="DateEnd" value="{{ $certificate->DateEnd }}">
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Tên chứng chỉ</label>
            <input type="text" class="form-control input-custom" name="DegreeCertificate" value="{{ $certificate->DegreeCertificate }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Loại chứng chỉ</label>
            <input type="text" class="form-control input-custom" name="TypeCertificate" value="{{ $certificate->TypeCertificate }}">
        </div>

        

        

        <div class="mb-3">
            <label class="form-label">Lĩnh vực chứng chỉ</label>
            <input type="text" class="form-control input-custom" name="FieldCertificate" value="{{ $certificate->FieldCertificate }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Trình độ chứng chỉ</label>
            <input type="text" class="form-control input-custom" name="LevelCertificate" value="{{ $certificate->LevelCertificate }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Cơ sở đào tạo</label>
            <input type="text" class="form-control input-custom" name="BasisTrain" value="{{ $certificate->BasisTrain }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Địa điểm đào tạo</label>
            <input type="text" class="form-control input-custom" name="LocationTrain" value="{{ $certificate->LocationTrain }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Xếp loại</label>
            <input type="text" class="form-control input-custom" name="Classification" value="{{ $certificate->Classification }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Điểm số</label>
            <input type="text" class="form-control input-custom" name="Score" value="{{ $certificate->Score }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Gửi đi học</label>
            <select class="form-control input-custom" name="SentStudy">
                <option value="1" {{ $certificate->SentStudy ? 'selected' : '' }}>Có</option>
                <option value="0" {{ !$certificate->SentStudy ? 'selected' : '' }}>Không</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Chứng chỉ quốc tế</label>
            <select class="form-control input-custom" name="InternationalCertificate">
                <option value="1" {{ $certificate->InternationalCertificate  ? 'selected' : '' }}>Có</option>
                <option value="0" {{ $certificate->InternationalCertificate  ? 'selected' : '' }}>Không</option>
            </select>
            
        </div>

        <div class="mb-3">
            <label class="form-label">Ngày chứng nhận</label>
            <input type="date" class="form-control input-custom" name="DateCertificate" value="{{ $certificate->DateCertificate }}">
        </div>
        <div class="mb-3">
            <label class="form-label">File chứng chỉ</label>
            <input type="file" class="form-control input-custom" name="File">
            @if($certificate->File)
                <p class="mt-2"><strong>File hiện tại:</strong> <a href="{{ asset($certificate->File) }}" target="_blank">Xem File</a></p>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>
</div>
</div>
@endsection
