@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="form-container">
        <div class="card p-4 shadow-lg" style="border-radius: 10px; background-color: white;">
            <h2 class="text-red fw-bold" style="font-weight: bold;"><i class="fas fa-edit"></i> CHỈNH SỬA THAM GIA DỰ ÁN</h2>
            
            <form action="{{ route('join-projects.update', $joinProject->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label for="status_id" class="form-label fw-bold">Trạng Thái</label>
                    <select id="status_id" name="status_id" class="form-control input-custom" required>
                        @foreach($status as $statusItem)
                            <option value="{{ $statusItem->id }}" {{ $joinProject->status_id == $statusItem->id ? 'selected' : '' }}>
                                {{ $statusItem->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="DateStart" class="form-label fw-bold">Ngày Bắt Đầu</label>
                    <input type="date" class="form-control input-custom" id="DateStart" name="DateStart" value="{{ $joinProject->DateStart }}" required>
                </div>

                <div class="mb-3">
                    <label for="DateEnd" class="form-label fw-bold">Ngày Kết Thúc</label>
                    <input type="date" class="form-control input-custom" id="DateEnd" name="DateEnd" value="{{ $joinProject->DateEnd }}" required>
                </div>

                <div class="mb-3">
                    <label for="ProductName" class="form-label fw-bold">Tên Sản Phẩm</label>
                    <input type="text" class="form-control input-custom" id="ProductName" name="ProductName" value="{{ $joinProject->ProductName }}" required>
                </div>

                <div class="mb-3">
                    <label for="Description" class="form-label fw-bold">Mô Tả</label>
                    <textarea class="form-control input-custom" id="Description" name="Description" rows="4" required>{{ $joinProject->Description }}</textarea>
                </div>
                
                <div class="mb-3">
                    <label for="nhansu_id" class="form-label fw-bold">Nhân Sự</label>
                    <select id="nhansu_id" name="nhansu_id" class="form-control input-custom" required>
                        @foreach($nhansu as $ns)
                            <option value="{{ $ns->id }}" {{ $joinProject->nhansu_id == $ns->id ? 'selected' : '' }}>
                                {{ $ns->hoten }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary">Cập Nhật</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection