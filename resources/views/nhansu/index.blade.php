@extends('layouts.app')
@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="form-container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 style="font-weight: bold;">DANH SÁCH NHÂN SỰ</h2>
        
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead style="background-color:rgb(159, 194, 230); color: white;" class="table-dark">
            <tr>
                <th>ID</th>
                <th>Họ tên</th>
                <th>Giới tính</th>
                <th>Hình ảnh</th>
                <th>Email</th>
                <th>Địa chỉ</th>
                <th>Ngày tạo</th>
                <th>Chi Tiết</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($nhansu as $ns)
            <tr>
                <td>{{ $ns->id }}</td>
                <td>{{ $ns->hoten }}</td>
                <td>{{ $ns->gioitinh == 'male' ? 'Nam' : 'Nữ' }}</td>
                
                <td>
                @if ($ns->hinhanh)
                <img src="{{ asset('uploads/nhansu/' . basename($ns->hinhanh)) }}" alt="Hình ảnh" width="50">

                @else
                    Không có ảnh
                @endif
                </td>
                <td>{{ $ns->email }}</td>
                <td>{{ $ns->diachi }}</td>
                <td>{{ $ns->created_at->format('d/m/Y H:i') }}</td>
                <td>
                    <a href="{{ route('nhansu.show', $ns->id) }}" class="btn btn-success btn-sm">Xem</a>
                </td>
                <td>
                    <a href="{{ route('nhansu.edit', $ns->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                </td>
                <td>
                    <form action="{{ route('nhansu.destroy', $ns->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    <div class="d-flex justify-content-center">
    {!! $nhansu->links('pagination::bootstrap-4') !!}
</div>
</div>

        


@endsection
