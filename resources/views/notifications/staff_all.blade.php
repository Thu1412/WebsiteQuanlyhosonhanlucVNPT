@extends('layouts.appuser')

@section('content')
<div class="content-wrapper">
    <div class="container py-4">
        <div class="card p-4 shadow-lg" style="border-radius: 10px; background-color: white;">
            
        <h2 class="text-red fw-bold text-center" style="font-weight: bold;">
            THÔNG TIN NHÂN SỰ
        </h2>
        <h3>Tất cả Thông báo (Nhân sự)</h3>
        @forelse($notifications as $notify)
            <div class="card mb-2">
                <div class="card-body">
                    <h5 class="card-title">{{ Str::limit($notify->content, 50) }}</h5>
                    <p class="card-text">{{ $notify->created_at->diffForHumans() }}</p>
                    @if(!$notify->is_read)
                        <span class="badge badge-warning">Chưa đọc</span>
                    @endif
                </div>
            </div>
        @empty
            <p>Không có thông báo nào.</p>
        @endforelse
    </div>
    </div>
</div>
@endsection
