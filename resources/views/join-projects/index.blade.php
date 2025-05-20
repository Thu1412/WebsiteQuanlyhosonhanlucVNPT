@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="form-container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 style="font-weight: bold;">DANH SÁCH THAM GIA DỰ ÁN</h2>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-primary">
                    <tr>
                        <th class="text-left">STT</th>
                        <th >Nhân sự</th>
                        <th >Từ ngày</th>
                        <th >Đến ngày</th>
                        <th class="text-left">Sản phẩm CNTT</th>
                        <th >Mô tả</th>
                        <th class="text-left">Trạng Thái</th>
                        <th class="text-center">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($joinProjects as $index => $project)
                        <tr>
                            <td class="text-left">{{ ($joinProjects->currentPage() - 1) * $joinProjects->perPage() + $index + 1 }}</td>
                            <td class="text-left">{{ $project->nhansu->hoten ?? 'Không có dữ liệu' }}</td>
                            <td class="text-left">{{ date('d/m/Y', strtotime($project->DateStart)) }}</td>
                            <td class="text-left">{{ date('d/m/Y', strtotime($project->DateEnd)) }}</td>
                            <td class="text-left">{{ $project->ProductName }}</td>
                            <td class="text-left">{{ $project->Description }}</td>
                            <td class="text-left">{{ $project->status ? $project->status->name : 'Không xác định' }}</td>
                            <td class="text-center text-nowrap">
                                <a href="{{ route('join-projects.show', $project->id) }}" class="btn btn-success btn-sm">Xem</a>
                                <a href="{{ route('join-projects.edit', $project->id) }}" class="btn btn-sm btn-warning">Sửa</a>
                                <form action="{{ route('join-projects.destroy', $project->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-3">
            <span class="text-danger fw-bold">Hiển thị {{ $joinProjects->count() }} / {{ $joinProjects->total() }} dự án</span>
            {!! $joinProjects->links('pagination::bootstrap-4') !!}
        </div>
    </div>
</div>
@endsection