<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('user.index') }}" class="brand-link">
      <img src="dist/img/logovnpt.jpg" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">VNPT USER</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        <img src="{{ asset(Auth::user()->nhansu->hinhanh ?? 'dist/img/default-avatar.jpg') }}" 
        class="img-circle elevation-2" >
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ auth()->user()->name }}</a>
        </div>
      </div>

      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <a href="{{ route('profile') }}" class="nav-link">
                  <i class="nav-icon fas fa-user"></i>
                  <p>
                      Thông Tin Cá Nhân
                  </p>
              </a>
              <a href="{{ route('hocvannhansu') }}" class="nav-link">
                  <i class="nav-icon fas fa-graduation-cap"></i>
                  <p>
                      Trình Độ Học Vấn
                  </p>
              </a>
              <a href="{{ route('chungchinhansu') }}" class="nav-link">
                  <i class="nav-icon fas fa-certificate"></i>
                  <p>
                      Chứng Nhận Chứng Chỉ
                  </p>
              </a>
              <a href="{{ route('thamgiaduannhansu') }}" class="nav-link">
                  <i class="nav-icon fas fa-project-diagram"></i>
                  <p>
                      Tham Gia Dự Án
                  </p>
              </a>
              <a href="{{ route('daotaonhansu') }}" class="nav-link">
                  <i class="nav-icon fas fa-chalkboard-teacher"></i>
                  <p>
                      Đào Tạo
                  </p>
              </a>
          </ul>
      </nav>

      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
