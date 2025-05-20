<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;

class TaiKhoanController extends Controller
{
    public function index()
    {
        // Lấy danh sách tài khoản Admin
        $admins = User::where('role', 'admin')->get();
        
        // Lấy danh sách tài khoản User
        $users = User::where('role', 'user')->get();

        return view('taikhoan.index', compact('admins', 'users'));
    }
    public function create()
    {
        return view('taikhoan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
        ], [
            'email.unique' => 'Email đã tồn tại, vui lòng nhập email khác.',
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'plain_password' => $request->password,
            'role' => 'admin', // Chỉ tạo quyền admin
            'status' => 'active',
        ]);

        return redirect()->route('taikhoan.index')->with('success', 'Tạo tài khoản thành công!');
    }
}