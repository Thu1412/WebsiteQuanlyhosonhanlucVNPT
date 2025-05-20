@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="form-container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 style="font-weight: bold;">DANH SÁCH CHỨNG CHỈ, CHỨNG NHẬN</h2>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-primary">
                    <tr>
                    <th>ID</th>
                    <th>Ngày Chứng Nhận</th>
                    <th>Chứng Chỉ</th>
                    <th>Loại Chứng Chỉ</th>
                    <th>Trạng Thái</th>
                    <th>Hành Động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($certificates as $index => $certificate)
                        <tr>
                        <td>{{ $certificate->id }}</td>
                        <td>{{ $certificate->DateCertificate }}</td>
                        <td>{{ $certificate->DegreeCertificate }}</td>
                        <td>{{ $certificate->TypeCertificate }}</td>
                        <td>{{ $certificate->status ? $certificate->status->name : 'N/A' }}</td> <!-- Hiển thị tên trạng thái nếu có -->
                        <td class="text-center">
                        <a href="{{ route('certificates.show', $certificate->id) }}" class="btn btn-success btn-sm">Xem</a>
                            <a href="{{ route('certificates.edit', $certificate->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                            <form action="{{ route('certificates.destroy', $certificate->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</button>
                                <a href="{{ route('certificates.export', $certificate->id) }}" class="btn btn-info btn-sm">Export</a>
                        
                            </form>
                        </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-3">
            <span class="text-danger fw-bold">Hiển thị {{ $certificates->count() }} / {{ $certificates->total() }} chứng chỉ</span>
            {!! $certificates->links('pagination::bootstrap-4') !!}
        </div>
    </div>
</div>
@endsection