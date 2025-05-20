@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container py-4">
        <div class="card" style="background-color: rgb(205, 248, 165); padding: 20px;">
        
    <h2 class="text-red fw-bold text-center" style="font-weight: bold;">TẤT CẢ THÔNG BÁO</h2>
<!-- Thông báo không phải từ admin -->
<!-- Thông báo không phải từ admin -->
<h3 class="mt-4 text-success">Thông báo từ các nhân sự khác:</h3>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Sender</th>
            <th>Thông báo</th>
            <th>Công cụ</th> <!-- Thêm cột Công cụ -->
        </tr>
    </thead>
    <tbody>
        @foreach ($notificationsNotSentByAdmin as $notification)
        <tr>
            <td>{{ $notification->sender->name }}</td>
            <td>{{ $notification->message }}</td>
            <td>
                <!-- Nút xử lý -->
                <form action="{{ route('notifications.process', $notification->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-primary">Xử lý</button>
                </form>

                <!-- Nút xóa -->
                <form action="{{ route('notifications.delete', $notification->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


<!-- Thông báo từ admin -->
<h3 class="mt-4 text-success">Thông báo từ admin:</h3>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nội dung</th>
            <th>Ngày gửi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($notificationsSentByAdmin as $notification)
            <tr>
                <td>{{ $notification->id }}</td>
                <td>{{ Str::limit($notification->message, 50) }}</td>
                <td>{{ $notification->created_at->format('d/m/Y H:i') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
</div>
</div>
@endsection