@extends('layouts.appuser')

@section('content')
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông báo</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
<div class="content-wrapper">
    <div class="container py-4">
        <div class="card p-4 shadow-lg" style="border-radius: 10px; background-color: white;">
        <header>
        <h2 class="text-red fw-bold text-center" style="font-weight: bold;">DANH SÁCH THÔNG BÁO</h2>
        </header>

        <div class="notification-list">
            <ul>
                @foreach($notifications as $notification)
                    <li class="notification-item">
                        <div class="notification-type">Loại: <strong>{{ $notification->type }}</strong></div>
                        <div class="notification-message">{{ $notification->message }}</div>
                        <div class="notification-status">Đã đọc: {{ $notification->is_read ? 'Có' : 'Chưa' }}</div>
                    </li>
                @endforeach
            </ul>
        </div>

        <section class="create-notification-form">
        <h2 class="text-red fw-bold text-center" style="font-weight: bold;">GỬI THÔNG BÁO MỚI</h2>
            <form action="{{ route('notifications.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="type">Loại Thông Báo:</label>
                    <select name="type" id="type" required>
                        <option value="certificate">Chứng Chỉ</option>
                        <option value="education">Học vấn</option>
                        <option value="training">Đào tạo</option>
                        <option value="join-projects">Tham gia dự án</option>
                        <option value="admin_response">Phản Hồi Admin</option>
                        <option value="info">Thông Tin</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="message">Nội Dung Thông Báo:</label>
                    <textarea name="message" id="message" rows="4" required></textarea>
                </div>

                <input type="hidden" name="nhansu_id" value="{{ auth()->user()->nhansu_id }}">

                <div class="form-group">
                    <button type="submit">Gửi Thông Báo</button>
                </div>
            </form>
        </section>
    </div>
    </div>
</div>
</body>
</html>
@endsection
