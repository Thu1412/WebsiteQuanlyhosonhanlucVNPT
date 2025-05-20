@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="form-container">
    <div class="card p-4 shadow-lg" style="border-radius: 10px; background-color: white;">
            <h2 class="text-red fw-bold" style="font-weight: bold;">CHỈNH SỬA TRÌNH ĐỘ HỌC VẤN</h2>

    <form action="{{ route('educations.update', $education->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6">
                <label class="form-label fw-bold " style="color: black !important;">Nhân sự</label>
                <p class="form-control input-custom">{{ $education->nhansu->hoten }}</p>
            </div>
            <div class="col-md-6">
                <label class="form-label fw-bold " style="color: black !important;">Trạng thái</label>
                <select name="status_id" class="form-control input-custom">
                    <option value="1" {{ $education->status_id == 1 ? 'selected' : '' }}>Đang Học</option>
                    <option value="2" {{ $education->status_id == 2 ? 'selected' : '' }}>Đã Tốt Nghiệp</option>
                    <option value="3" {{ $education->status_id == 3 ? 'selected' : '' }}>Bị Đình chỉ</option>
                </select>
            </div>
        </div>


        <div class="row mt-3">
            <div class="col-md-6">
                <label class="form-label fw-bold " style="color: black !important;">Ngày bắt đầu</label>
                <input type="date" name="DateStart" class="form-control input-custom" value="{{ old('DateStart', $education->DateStart) }}" required>
            </div>
            <div class="col-md-6">
                <label class="form-label fw-bold " style="color: black !important;">Ngày kết thúc</label>
                <input type="date" name="DateEnd" class="form-control input-custom" value="{{ old('DateEnd', $education->DateEnd) }}" required>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-6">
                <label class="form-label fw-bold " style="color: black !important;">Trường Đào Tạo</label>
                <select id="BasisTrainSelect" name="BasisTrain" class="form-control input-custom">
                <option value="{{ old('BasisTrain', $education->BasisTrain) }}">{{ old('BasisTrain', $education->BasisTrain) }}</option>
                </select>   
            </div>
            <div class="col-md-6">
                <label class="form-label fw-bold " style="color: black !important;">Chương Trình Đào Tạo</label>
                <select id="StandardTrainSelect" name="StandardTrain" class="form-control input-custom" disabled>

                <option value="{{ old('StandardTrain', $education->StandardTrain) }}">{{ old('StandardTrain', $education->StandardTrain) }}</option>
            </select>
            </div>
            
        </div>
        
        

        <div class="row mt-3">
            <div class="col-md-6">
                <label class="form-label fw-bold " style="color: black !important;">Ngành đào tạo</label>

                <select id="FormTrainSelect" name="FormTrain" class="form-control input-custom" disabled>

                <option value="{{ old('FormTrain', $education->FormTrain) }}">{{ old('FormTrain', $education->FormTrain) }}</option>
            </select>
            </div>
            <div class="col-md-6">
                <label class="form-label fw-bold " style="color: black !important;">Loại đào tạo</label>
                <select name="TypeTrain" class="form-control input-custom">
                  <option value="{{ old('TypeTrain', $education->TypeTrain) }}">{{ old('TypeTrain', $education->TypeTrain) }}</option>
                  <option value="Chính quy">Chính quy</option>
                  <option value="Tại chức">Tại chức</option>
                  <option value="Liên thông">Liên thông</option>
                  <option value="Vừa học vừa làm">Vừa học vừa làm</option>
                  <option value="Khác">Khác</option>
              </select>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-6">
                <label class="form-label fw-bold " style="color: black !important;">Xếp loại bằng cấp</label>
                <select name="DegreeClassific" class="form-control input-custom">
                    <option value="{{ old('DegreeClassific', $education->DegreeClassific) }}">{{ old('DegreeClassific', $education->DegreeClassific) }}</option>
                    <option value="Xuất sắc">Xuất sắc</option>
                    <option value="Giỏi">Giỏi</option>
                    <option value="Khá">Khá</option>
                    <option value="Trung bình">Trung bình</option>
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label fw-bold " style="color: black !important;">Danh hiệu đào tạo</label>
                <select name="TitleTrain" class="form-control input-custom">
                    <option value="{{ old('TitleTrain', $education->TitleTrain) }}">{{ old('TitleTrain', $education->TitleTrain) }}</option>
                    <option value="Cử nhân">Cử nhân</option>
                    <option value="Kỹ sư">Kỹ sư</option>
                    <option value="Thạc sĩ">Thạc sĩ</option>
                    <option value="Tiến sĩ">Tiến sĩ</option>
                    <option value="Khác">Khác</option>
                </select>
            </div>
            
        </div>

        <div class="row mt-3">
            <div class="col-md-6">
                <label class="form-label fw-bold " style="color: black !important;">Bậc Đào Tạo</label>
                <select name="EducationLevel" class="form-control input-custom">
                  <option value="{{ old('EducationLevel', $education->EducationLevel) }}">{{ old('EducationLevel', $education->EducationLevel) }}</option>
                  <option value="1">Trung cấp</option>
                  <option value="2">Cao đẳng</option>
                  <option value="3">Đại học</option>
                  <option value="4">Thạc sĩ</option>
                  <option value="5">Tiến sĩ</option>
                  <option value="6">Khác</option>
              </select>
            </div>
            <div class="col-md-6">
                <label class="form-label fw-bold " style="color: black !important;">Gửi đi học</label>
                <select name="SentStudy" class="form-control input-custom">
                <option value="{{ old('SentStudy', $education->SentStudy) }}">{{ old('SentStudy', $education->SentStudy) }}</option>
                    <option value="1" {{ $education->SentStudy == 1 ? 'selected' : '' }}>Có</option>
                    <option value="0" {{ $education->SentStudy == 0 ? 'selected' : '' }}>Không</option>
                </select>
            </div>
        </div>

        
        <div class="mt-3">
            <label class="form-label fw-bold " style="color: black !important;">Tập tin đính kèm (PDF, DOC, DOCX)</label>
            <input type="file" name="File" class="form-control input-custom">
            @if ($education->File)
                <p><a href="{{ asset($education->File) }}" target="_blank">Xem file hiện tại</a></p>
            @endif
        </div>
        <button type="submit" class="btn btn-primary mt-4">Cập nhật</button>
        <a href="{{ route('educations.index') }}" class="btn btn-secondary mt-4">Quay lại</a>
    </form>
</div>
</div>
@endsection