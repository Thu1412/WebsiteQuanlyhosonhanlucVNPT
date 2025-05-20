@extends('layouts.app')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <!-- /.content-header -->

    
<div class="form-container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 style="font-weight: bold;">DANH SÁCH TRÌNH ĐỘ HỌC VẤN</h2>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead style="background-color:rgb(159, 194, 230); color: white;" class="table-dark">
                <tr>
                    <th class="text-left"> Ngày bắt đầu</th>
                    <th class="text-left">Ngày kết thúc</th>
                    <th class="text-left"> Tên Nhân Sự</th>
                    <th class="text-left">Trường đào tạo</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($educations as $education)
                    <tr>
                        <td class="text-left">{{ $education->DateStart }}</td>
                        <td class="text-left">{{ $education->DateEnd }}</td>
                        <td class="text-left">{{ $education->nhansu->hoten ?? 'Không xác định' }}</td>
                        <td class="text-left">{{ $education->BasisTrain }}</td>  

                        <td class="text-center">
                       
                            <a href="{{ route('educations.edit', $education->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                            <form action="{{ route('educations.destroy', $education->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Bạn có chắc chắn muốn xóa không?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                        </form>
                        <a href="{{ route('educations.show', $education->id) }}" class="btn btn-info btn-sm">Xem</a>
                        <a href="{{ route('education.export', $education->id) }}" class="btn btn-success btn-sm">Export</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

    <!-- Hiển thị phân trang -->
    <div class="d-flex justify-content-center">
            {!! $educations->links('pagination::bootstrap-4') !!}
        </div>
    <!-- Main content -->
    
    <!-- /.content -->
  </div>

        

  @endsection  
