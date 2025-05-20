<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>HỆ THỐNG QUẢN LÝ HỒ SƠ NHÂN SỰ VNPT</title>
  <style>
    .table td, .table th {
    color: black !important;
}
table, th, td {
        text-align: center;
        vertical-align: middle;
    }
    .form-container {
        
            width: auto;
            height: auto;
            margin: 50px auto;
            padding: 20px;
            background-color: rgb(255, 255, 255);
            border-radius: 10px;
            border: 2px solid #5c9a8d;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            
        }
       

  
    .input-custom {
    background-color: white !important;
    border: 1px solid #ccc;
    border-radius: 6px;
    padding: 10px; /* Tăng padding để input to hơn */
    height: 50px; /* Tăng chiều cao */
    font-size: 16px; /* Chữ to hơn */
    color: black !important;
}



    

   

    .table tbody tr {
        background-color: white;
        color: black;
    }

    .table tbody tr:nth-child(even) {
        background-color: #f8f9fa; /* Hàng chẵn có nền nhẹ */
    }
    .table td, .table th {
    color: black !important;
}
    .form-container {
        
            width: auto;
            height: auto;
            margin: 50px auto;
           
            padding: 20px;
            background-color: rgb(255, 255, 255);
            border-radius: 10px;
            border: 2px solid #5c9a8d;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            
        }
        
        .form-container h2 {
            color: Red;
            margin: auto;
            text-align: center;
            justify-content: center; /* Căn giữa ngang */
            align-items: center;
            padding: 10px;
            border-radius: 8px;
            padding: 10px;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }
        .form-container h4 {
            color: Black;
            margin: auto;
            text-align: center;
            justify-content: center; /* Căn giữa ngang */
            align-items: center;
            padding: 10px;
            border-radius: 8px;
            padding: 10px;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }
        .form-container h3 {
            color: Black;
            margin: auto;
            align-items: center;
            padding: 10px;
            border-radius: 8px;
            padding: 10px;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }
        .form-container label {
            color: Red;
            margin: auto; 
            align-items: center;
            padding: 10px;
            border-radius: 8px;
            padding: 10px;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
            text-align: left !important;
            display: block;
            width: 100%;
            font-weight: bold; /* Giữ chữ đậm nếu cần */
        }

        .button-container {
          display: flex;
    justify-content: center; /* Căn giữa ngang */
    align-items: center; /* Căn giữa dọc nếu cần */
    width: 100%; /* Đảm bảo nó chiếm toàn bộ chiều rộng */
    margin-top: 10px; /* Tạo khoảng cách với các input trên */
}

.input-custom {
    background-color: white !important;
    border: 1px solid #ccc;
    border-radius: 6px;
    padding: 10px; /* Tăng padding để input to hơn */
    height: 50px; /* Tăng chiều cao */
    font-size: 16px; /* Chữ to hơn */
    color: black !important;
}
    .table td, .table th {
    color: black !important;
}

    </style>  
    
   


    

   

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="{{asset('dist/img/logovnpt.jpg')}}"  height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="" class="nav-link">Trang Chủ</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
         @php
    $unreadNotifications = $notifications->where('is_read', false)->count(); // Lấy số lượng thông báo chưa đọc
        @endphp
    <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>Thông báo
            @if($unreadNotifications > 0)
                <span class="badge badge-warning navbar-badge">{{ $unreadNotifications }}</span>
            @endif
        </a>

        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            @if($notifications->count() > 0)
                <span class="dropdown-item dropdown-header">{{ $notifications->count() }} Notifications</span>
                <div class="dropdown-divider"></div>

                @foreach ($notifications as $noti)
    @if(isset($noti->data['id']))
        <a href="{{ route('request.edit.form', ['type' => $noti->type, 'id' => $noti->data['id']]) }}">
            <i class="fas fa-info-circle mr-2"></i> {{ $noti->message }}
            <span class="float-right text-muted text-sm">{{ $noti->created_at->diffForHumans() }}</span>
        </a>
        <div class="dropdown-divider"></div>
    @endif
@endforeach

                
                    <a href="{{ route('notifications.all') }}" class="dropdown-item dropdown-footer">Xem tất cả</a>
                
            @else
           
                <span class="dropdown-item dropdown-header">Không có thông báo mới</span>
                 <a href="{{ route('notifications.all') }}" class="dropdown-item dropdown-footer">Xem tất cả</a>
            @endif
        </div>
    </li>
</ul>



 
    
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    

    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user"></i> {{ Auth::user()->name }}
        </a>
        
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="{{ route('home.doimatkhau') }}">
            <i class="fas fa-sign-out-alt"></i> Đổi Mật Khẩu
          </a>
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      

    </ul>
  </nav>
  @yield('content')
  @include('partials.navbar')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  @include('partials.footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.js')}}"></script>


<!-- jQuery Mapael -->
<script src="{{asset('plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{asset('plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
<script src="{{asset('plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
<!-- ChartJS -->
 <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- AdminLTE for demo purposes -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
<script src="{{ asset('js/university.js') }}"></script> 
<script src="{{ asset('js/custom.js') }}"></script>
<script>
        function validateFile() {
            var fileInput = document.getElementById('fileUpload');
            if (fileInput.files.length > 0) {
                var file = fileInput.files[0];
                var allowedTypes = ['application/pdf', 'image/jpeg', 'image/png'];
                if (!allowedTypes.includes(file.type)) {
                    alert('Chỉ cho phép tệp PDF, JPG hoặc PNG.');
                    return false;
                }
                if (file.size > 2 * 1024 * 1024) { // 2MB
                    alert('Kích thước tệp không được vượt quá 2MB.');
                    return false;
                }
            }
            return true;
        }
    </script>
    @stack('scripts')
</body>
</html>

