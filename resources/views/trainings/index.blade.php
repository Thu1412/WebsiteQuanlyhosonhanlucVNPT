@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="form-container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 style="font-weight: bold;">DANH SÁCH ĐÀO TẠO</h2>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-primary text-white">
                    <tr>
                        <th>STT</th>
                        <th>Từ ngày</th>
                        <th>Đến ngày</th>
                        <th>Nhân sự</th>
                        <th>Tên khóa đào tạo/ chứng chỉ</th>
                        <th>Hình thức tổ chức</th>
                        <th>Đơn vị nội bộ đào tạo</th>
                        <th>Đơn vị bên ngoài đào tạo</th>
                        <th>Dự án đào tạo</th>
                        <th>:</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($trainings as $key => $training)
                        <tr>
                            <td>{{ ($trainings->currentPage() - 1) * $trainings->perPage() + $loop->iteration }}</td>
                            <td>{{ date('d/m/Y', strtotime($training->DateStart)) }}</td>
                            <td>{{ date('d/m/Y', strtotime($training->DateEnd)) }}</td>
                            <td>{{ $training->nhansu->hoten ?? 'Không có nhân sự' }}</td> <!-- Hiển thị tên nhân sự -->
                            
                            <td>{{ $training->CourseTrain }}</td>
                            <td>{{ $training->OrganizeForm }}</td>
                            <td>{{ $training->UnitTrain }}</td>
                            <td>{{ $training->Unit }}</td>
                            <td>{{ $training->ContentCommit }}</td>
                            
                            <td class="text-center">
                                <div class="dropdown">
                                    <button class="btn btn-light btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                        ⋮
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('trainings.show', $training->id) }}">👁 Xem</a>
                                        <a class="dropdown-item" href="{{ route('trainings.edit', $training->id) }}">✏️ Sửa</a>
                                        <form action="{{ route('trainings.destroy', $training->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item text-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                                🗑 Xóa
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-between align-items-center mt-3">
            <span class="text-danger fw-bold">Hiển thị {{ $trainings->count() }} / {{ $trainings->total() }} Đào Tạo</span>
            {!! $trainings->links('pagination::bootstrap-4') !!}
        </div>
    </div>
</div>
@endsection
