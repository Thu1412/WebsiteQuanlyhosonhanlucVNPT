@extends('layouts.appuser')

@section('content')
<div class="content-wrapper">
    <div class="card p-4 shadow-lg" style="border-radius: 10px; background-color: white;">
            <h2 class="text-red fw-bold text-center" style="font-weight: bold;"><i class="fas fa-plus-circle"></i>GỬI YÊU CẦU</h2>
    <h3> {{ $type == 'certificate' ? 'Chứng chỉ, chứng nhận' : 'Học vấn' }} (ID: {{ $id }})</h3>
    <form action="{{ route('request.edit.send') }}" method="POST">
        @csrf
        <input type="hidden" name="type" value="{{ $type }}">
        <input type="hidden" name="id" value="{{ $id }}">
        <div class="form-group">
            <label for="message">Nội dung yêu cầu:</label>
            <textarea name="message" class="form-control" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Gửi Yêu Cầu</button>
    </form>
</div>
</div>
@endsection
