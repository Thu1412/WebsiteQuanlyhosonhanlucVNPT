<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link">
    <img src="dist/img/logovnpt.jpg" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">VNPT ADMIN</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      

      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
          <a href="{{ route('dashboard') }}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                TỔNG QUAN
              </p>
            </a>
            <li class="nav-header">QUẢN LÝ</li>
            <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
              <p>
                Nhân Sự
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('nhansu.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh Sách</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('nhansu.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm</p>
                </a>
              </li>
               
            </ul>
          </li>
          <li class="nav-item">
          <a href="#" class="nav-link">
              <i class="nav-icon fas fa-microchip"></i>
              <p>
                Tài Khoản
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{route('taikhoan.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh Sách</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('taikhoan.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm</p>
                </a>
              </li>
               
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
              Trình Độ Học Vấn
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('educations.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh Sách</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('educations.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm</p>
                </a>
              </li>
               
            </ul>
          </li>
          
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Tham Gia Dự Án
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('join-projects.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh Sách</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('join-projects.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm</p>
                </a>
              </li>
               
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Chứng Chỉ Chứng Nhận
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('certificates.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh Sách</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('certificates.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm</p>
                </a>
              </li>
               
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Đào Tạo
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('trainings.index')}}" class="nav-link">

                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh Sách</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('trainings.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm</p>
                </a>
              </li>
               
            </ul>
          </li>
          </li>
          
          
          
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>