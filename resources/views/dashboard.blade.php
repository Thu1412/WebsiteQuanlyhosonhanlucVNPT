
@extends('layouts.app')
@section('content')
    
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
      <div class="d-flex justify-content-center">
    <h2 style="font-weight: bold; color: red; text-align: center;">
        HỆ THỐNG QUẢN LÝ HỒ SƠ NHÂN LỰC VNPT
    </h2>
</div>
        <div class="row mb-2">
        
        
          <div class="col-sm-6">
         

          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row justify-content-center">
           <div class="col-12 col-sm-6 col-md-4">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-certificate"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Số chứng chỉ đã cấp</span>
                        <span class="info-box-number">{{ $issuedCertificates }}</span>
                    </div>
                </div>
            </div>
          <!-- /.col -->
          <!-- Số dự án đã hoàn thành -->
          <div class="col-12 col-sm-6 col-md-4">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-check-circle"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Số dự án đã hoàn thành</span>
                        <span class="info-box-number">{{ $completedProjects }}</span>
                    </div>
                </div>
            </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <!-- Số khóa đào tạo đã hoàn thành -->
          <div class="col-12 col-sm-6 col-md-4">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-book-open"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Số khóa đào tạo đã hoàn thành</span>
                        <span class="info-box-number">{{ $completedTrainings }}</span>
                    </div>
                </div>
            </div>
          <!-- /.col -->
          
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
        <div class="col-md-6">
          <p class="text-center">
              <strong>DỮ LIỆU QUẢN LÝ</strong>
          </p>
          @php
              function getPercentage($value, $total) {
                  return $total > 0 ? round(($value / $total) * 100, 2) : 0;
              }
          @endphp
          @php
              function getMaxValue($value) {
                  return ceil($value / 50) * 50;
              }
          @endphp

          <div class="progress-group">
              Dữ Liệu Nhân Sự
              @php $maxNhansu = getMaxValue($nhansu); @endphp
              <span class="float-right"><b>{{ $nhansu }}</b>/{{ $maxNhansu }}</span>
              <div class="progress progress-sm">
                  <div class="progress-bar bg-primary" style="width: {{ getPercentage($nhansu, $maxNhansu) }}%"></div>
              </div>
          </div>

          <div class="progress-group">
              Dữ liệu Tài Khoản
              @php $maxUsers = getMaxValue($users); @endphp
              <span class="float-right"><b>{{ $users }}</b>/{{ $maxUsers }}</span>
              <div class="progress progress-sm">
                  <div class="progress-bar bg-danger" style="width: {{ getPercentage($users, $maxUsers) }}%"></div>
              </div>
          </div>

          <div class="progress-group">
              <span class="progress-text">Dữ Liệu Trình Độ Học Vấn</span>
              @php $maxEducations = getMaxValue($educations); @endphp
              <span class="float-right"><b>{{ $educations }}</b>/{{ $maxEducations }}</span>
              <div class="progress progress-sm">
                  <div class="progress-bar bg-success" style="width: {{ getPercentage($educations, $maxEducations) }}%"></div>
              </div>
          </div>

          <div class="progress-group">
              Dữ Liệu Tham Gia Dự Án
              @php $maxJoinProjects = getMaxValue($joinProjects); @endphp
              <span class="float-right"><b>{{ $joinProjects }}</b>/{{ $maxJoinProjects }}</span>
              <div class="progress progress-sm">
                  <div class="progress-bar bg-warning" style="width: {{ getPercentage($joinProjects, $maxJoinProjects) }}%"></div>
              </div>
          </div>

          <div class="progress-group">
              Dữ Liệu Chứng Chỉ, Chứng Nhận
              @php $maxCertificates = getMaxValue($certificates); @endphp
              <span class="float-right"><b>{{ $certificates }}</b>/{{ $maxCertificates }}</span>
              <div class="progress progress-sm">
                  <div class="progress-bar bg-pink" style="width: {{ getPercentage($certificates, $maxCertificates) }}%"></div>
              </div>
          </div>

          <div class="progress-group">
              Dữ Liệu Đào Tạo
              @php $maxTrainings = getMaxValue($trainings); @endphp
              <span class="float-right"><b>{{ $trainings }}</b>/{{ $maxTrainings }}</span>
              <div class="progress progress-sm">
                  <div class="progress-bar bg-purple" style="width: {{ getPercentage($trainings, $maxTrainings) }}%"></div>
              </div>
          </div>

      </div>

    <div class="col-md-6">
      <p class="text-center">
          <strong>THỐNG KÊ NHANH</strong>
      </p>

            

    <div class="info-box mb-3 bg-success">
        <span class="info-box-icon"><i class="fas fa-user-plus"></i></span>
        <div class="info-box-content">
            <span class="info-box-text">Nhân sự mới trong tháng</span>
            <span class="info-box-number">{{ $newNhansu }}</span>
        </div>
    </div>

    <div class="info-box mb-3 bg-warning">
        <span class="info-box-icon"><i class="fas fa-chalkboard-teacher"></i></span>
        <div class="info-box-content">
            <span class="info-box-text">Khóa đào tạo đang diễn ra</span>
            <span class="info-box-number">{{ $ongoingTrainings }}</span>
        </div>
    </div>


    <div class="info-box mb-3 bg-info">
        <span class="info-box-icon"><i class="fas fa-project-diagram"></i></span>
        <div class="info-box-content">
            <span class="info-box-text">Dự án đang thực hiện</span>
            <span class="info-box-number">{{ $activeProjects }}</span>
        </div>
    </div>

    <div class="info-box mb-3 bg-secondary">
        <span class="info-box-icon"><i class="fas fa-user-check"></i></span>
        <div class="info-box-content">
            <span class="info-box-text">Nhân sự tham gia dự án</span>
            <span class="info-box-number">{{ $joinProjects }}</span>
        </div>
    </div>

    </div>
</div>

        <!-- /.row -->
@endsection    
