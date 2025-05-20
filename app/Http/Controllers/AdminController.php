<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Hiển thị trang dashboard của admin.
     */
    public function index()
    {
        return view('dashboard'); // Đảm bảo bạn có file resources/views/admin/dashboard.blade.php
    }

    /**
     * Hiển thị danh sách người dùng.
     */
    public function users()
    {
        $users = \App\Models\User::all(); // Lấy tất cả user (Đảm bảo Model User đã có)
        return view('admin.users', compact('users')); // Cần có file resources/views/admin/users.blade.php
    }

    /**
     * Hiển thị trang cài đặt admin.
     */
    public function settings()
    {
        return view('admin.settings'); // Đảm bảo bạn có file resources/views/admin/settings.blade.php
    }
}
