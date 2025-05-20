@extends('layouts.app')
@section('content')


  
<div class="content-wrapper">
    <div class="form-container">
<div class="d-flex justify-content-between align-items-center mb-3">
        <h2 style="font-weight: bold;">DANH SÁCH TÀI KHOẢN</h2>
        
    </div>

        <!-- Bảng tài khoản Admin -->
        <h3>Admin</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Mật khẩu</th>
                    <th>Trạng thái</th>
                <!--    <th>Hành động</th> -->
                </tr>
            </thead>
            <tbody>
                @foreach ($admins as $admin)
                <tr>
                    <td>{{ $admin->id }}</td>
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->email }}</td>
                    <td>#####</td>
                    <td>{{ $admin->status == 'active' ? '✅ Đang hoạt động' : '🔴 Bị khóa' }}</td>
                    <!--<td>
                        <a href="#" class="btn btn-primary">🔄 Sửa</a>
                        <a href="#" class="btn btn-success">❌ Xóa</a>
                    </td>-->
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Bảng tài khoản User -->
        <h3>User</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Mật khẩu</th>
                    <th>Trạng thái</th>
                 <!--    <th>Hành động</th> -->
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>#####</td>
                    <td>{{ $user->status == 'active' ? '✅ Đang hoạt động' : '🔴 Bị khóa' }}</td>
                  <!--   <td>
                        <a href="#" class="btn btn-primary">🔄 Sửa</a>
                        <a href="#" class="btn btn-success">❌ Xóa</a>
                    </td> -->
                </tr>
                @endforeach
            </tbody>
        </table>
    
</div>
</div>

@endsection
