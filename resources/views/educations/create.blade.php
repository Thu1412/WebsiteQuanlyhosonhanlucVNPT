@extends('layouts.app')
@section('content')

  <!-- Content Wrapper. Contains page content -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="form-container">
        <div class="card p-4 shadow-lg" style="border-radius: 10px; background-color: white;">
            <h2 class="text-red fw-bold" style="font-weight: bold;"><i class="fas fa-plus-circle"></i>THÊM MỚI TRÌNH ĐỘ HỌC VẤN</h2>
            <form action="{{ route('educations.store') }}" method="POST" enctype="multipart/form-data" onsubmit="return validateFile()">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
            <label for="nhansuSelect" class="form-label fw-bold" style="color: black !important;">Nhân sự:</label>

            @if($nhansu->isEmpty())
                <input type="text" class="form-control" value="Không còn nhân sự cần thêm trình độ học vấn" disabled>
            @else
                <select id="nhansuSelect" name="nhansu_id" class="form-control input-custom">
                    <option value="">Chọn nhân sự</option>
                    @foreach($nhansu as $ns)
                        <option value="{{ $ns->id }}">{{ $ns->hoten }}</option>
                    @endforeach
                </select>
            @endif
            </div>
            <div class="col-md-6 mb-3">
            <label for="statusSelect" class="form-label fw-bold " style="color: black !important;">Trạng Thái:</label>
                    <select id="statusSelect" name="status_id" class="form-control input-custom">
                        <option value="">Chọn trạng thái</option>
                        <option value="1">Đang Học</option>
                        <option value="2">Đã Tốt Nghiệp</option>
                        <option value="3">Bị Đình Chỉ</option>
                    </select>
            </div>
        </div>
        <div class="row">
            
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label class="form-label fw-bold " style="color: black !important;">Ngày Bắt Đầu:</label>
            <input type="date" name="DateStart" class="form-control input-custom" required>
          </div>
          <div class="col-md-6 mb-3">
            <label class="form-label fw-bold " style="color: black !important;">Ngày Kết Thúc:</label>
            <input type="date" name="DateEnd" class="form-control input-custom" required>
          </div>
        </div>
        
        <div class="row">
        <div class="col-md-6 mb-3">
        <label for="BasisTrainSelect" class="form-label fw-bold " style="color: black !important;">Trường Đào Tạo:</label>
        <select id="BasisTrainSelect" name="BasisTrain" class="form-control input-custom">
                <option value="">Chọn Trường Đào Tạo</option>
            </select>
        </div>
          <div class="col-md-6 mb-3">
          <label for="StandardTrainSelect" class="form-label fw-bold " style="color: black !important;">Chương Trình Đào Tạo:</label>
          <select id="StandardTrainSelect" name="StandardTrain" class="form-control input-custom" disabled>

                <option value="">Chọn chương trình đào tạo</option>
            </select>
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-6 mb-3">
          <label for="FormTrainSelect" class="form-label fw-bold " style="color: black !important;" >Ngành Đào Tạo:</label>
          <select id="FormTrainSelect" name="FormTrain" class="form-control input-custom" disabled>

                <option value="">Chọn ngành đào tạo</option>
            </select>
          </div>
          <div class="col-md-6 mb-3">
              <label class="form-label fw-bold" style="color: black !important;">Loại Đào Tạo:</label>
              <select name="TypeTrain" class="form-control input-custom">
                  <option value="">Chọn loại đào tạo</option>
                  <option value="Chính quy">Chính quy</option>
                  <option value="Tại chức">Tại chức</option>
                  <option value="Liên thông">Liên thông</option>
                  <option value="Vừa học vừa làm">Vừa học vừa làm</option>
                  <option value="Khác">Khác</option>
              </select>
          </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold" style="color: black !important;">Xếp loại bằng cấp:</label>
                <select name="DegreeClassific" class="form-control input-custom">
                    <option value="">Chọn xếp loại</option>
                    <option value="Xuất sắc">Xuất sắc</option>
                    <option value="Giỏi">Giỏi</option>
                    <option value="Khá">Khá</option>
                    <option value="Trung bình">Trung bình</option>
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold" style="color: black !important;">Danh hiệu đào tạo:</label>
                <select name="TitleTrain" class="form-control input-custom">
                    <option value="">Chọn danh hiệu</option>
                    <option value="Cử nhân">Cử nhân</option>
                    <option value="Kỹ sư">Kỹ sư</option>
                    <option value="Thạc sĩ">Thạc sĩ</option>
                    <option value="Tiến sĩ">Tiến sĩ</option>
                    <option value="Khác">Khác</option>
                </select>
            </div>
        </div>
                <div class="row">
                <div class="col-md-6 mb-3">
                  <label class="form-label fw-bold" style="color: black !important;">Bậc đào tạo:</label>
                  <select name="EducationLevel" class="form-control input-custom">
                  <option value="">Chọn bậc đào tạo</option>
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
                <option value="1">Có</option>
                <option value="0">Không</option>
                </select>
            </div>
            </div>
            <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold " style="color: black !important;">Tệp Đính Kèm (PDF, JPG, PNG, max 2MB):</label>
                <input type="file" name="File" id="fileUpload" class="form-control input-custom">
                
                @if(isset($education) && $education->File)
                    <p><a href="{{ asset($education->File) }}" target="_blank">Xem file hiện tại</a></p>
                @endif
            </div>
        </div>
                       
        
        
        <div class="text-center">
          <button type="submit" class="btn btn-success btn-sm btn-custom">Lưu</button>
          <a href="{{ route('educations.index') }}" class="btn btn-info btn-sm btn-custom">Quay lại</a>
        </div>
      </form>
        </div>
    </div>
</div>
        


@endsection