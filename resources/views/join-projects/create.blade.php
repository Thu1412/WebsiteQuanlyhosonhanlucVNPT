@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="form-container">
        <div class="card p-4 shadow-lg" style="border-radius: 10px; background-color: white;">
            <h2 class="text-red fw-bold"><i class="fas fa-plus-circle"></i> THÊM MỚI THAM GIA DỰ ÁN</h2>
            <form action="{{ route('join-projects.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="status_id" class="form-label fw-bold">Trạng Thái</label>
                    <select id="status_id" name="status_id" class="form-control input-custom" required>
                        @foreach($status as $statusItem)
                            <option value="{{ $statusItem->id }}">{{ $statusItem->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="DateStart" class="form-label fw-bold">Ngày Bắt Đầu</label>
                    <input type="date" class="form-control input-custom" id="DateStart" name="DateStart" required>
                </div>

                <div class="mb-3">
                    <label for="DateEnd" class="form-label fw-bold">Ngày Kết Thúc</label>
                    <input type="date" class="form-control input-custom" id="DateEnd" name="DateEnd" required>
                </div>

                <div class="mb-3">
                    <label for="ProductName" class="form-label fw-bold">Tên Sản Phẩm</label>
                    
                    {{-- Dropdown chọn sản phẩm --}}
                    <select id="productSelect" class="form-control input-custom mb-2">
                        <option value="" disabled selected>-- Chọn sản phẩm --</option>
                        @php
                            $productNames = \App\Models\JoinProject::distinct()->pluck('ProductName');
                        @endphp
                        @foreach($productNames as $name)
                            <option value="{{ $name }}">{{ $name }}</option>
                        @endforeach
                        <option value="custom">+ Sản phẩm mới</option>
                    </select>

                    {{-- Input nhập sản phẩm mới --}}
                    <input type="text" id="customProductInput" class="form-control input-custom mb-2" style="display: none;" placeholder="Nhập tên sản phẩm mới">

                    {{-- Input thực tế gửi lên --}}
                    <input type="hidden" name="ProductName" id="ProductNameHidden" required>
                </div>

                <div class="mb-3">
                    <label for="Description" class="form-label fw-bold">Mô Tả</label>
                    <textarea class="form-control input-custom" id="Description" name="Description" rows="4" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="nhansu_id" class="form-label fw-bold">Nhân sự</label>
                    <select id="nhansu_id" name="nhansu_id" class="form-control input-custom" required>
                        <option value="">Chọn nhân sự</option>
                        @foreach($nhansu as $ns)
                            <option value="{{ $ns->id }}">{{ $ns->hoten }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary">Tạo Dự Án</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const select = document.getElementById('productSelect');
        const customInput = document.getElementById('customProductInput');
        const hiddenInput = document.getElementById('ProductNameHidden');

        select.addEventListener('change', function () {
            if (this.value === 'custom') {
                customInput.style.display = 'block';
                customInput.value = '';
                hiddenInput.value = '';
                customInput.focus();
            } else {
                customInput.style.display = 'none';
                hiddenInput.value = this.value;
            }
        });

        customInput.addEventListener('input', function () {
            hiddenInput.value = this.value;
        });
    });
</script>
@endpush
