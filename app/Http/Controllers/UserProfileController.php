<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserProfileController extends Controller
{
    /**
     * Hiển thị trang hồ sơ cá nhân của user.
     */
    public function index()
    {
        $user = Auth::user(); // Lấy thông tin user đang đăng nhập
        return view('profile.index', compact('user'));
    }

    /**
     * Xử lý cập nhật thông tin user.
     */
    public function update(Request $request)
    {
        $user = Auth::user(); // Lấy user đang đăng nhập

        // Validate dữ liệu đầu vào
        $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'nullable|string|in:Nam,Nữ,Khác',
            'dob' => 'nullable|date',
            'phone' => 'nullable|string|max:15',
            'permanent_address' => 'nullable|string|max:255',
            'current_address' => 'nullable|string|max:255',
        ]);

        // Cập nhật thông tin user
        $user->update($request->all());

        return redirect()->back()->with('success', 'Cập nhật hồ sơ thành công!');
    }
}