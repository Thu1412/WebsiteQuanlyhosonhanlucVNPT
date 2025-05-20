<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\NhanSu;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Hiển thị form chỉnh sửa hồ sơ người dùng.
     */
    public function edit()
    {
        $user = Auth::user();
        $nhansu = NhanSu::where('user_id', $user->id)->first();
        return view('profile.edit', compact('user', 'nhansu'));
    }

    /**
     * Cập nhật thông tin người dùng.
     */
    public function update(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
        'password' => 'nullable|min:6',
        'hinhanh' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        'gioitinh' => 'required|in:male,female,other',
        'ngaysinh' => 'required|date',
        'diachi' => 'required|string|max:255',
        'sodienthoai' => 'required|string|max:20',
    ]);

    $user = Auth::user();
    $nhansu = NhanSu::where('user_id', $user->id)->first();

    $user->name = $request->name;
    $user->email = $request->email;

    if ($request->filled('password')) {
        $user->password = bcrypt($request->password);
    }

    $user->save();

    if ($nhansu) {
        $nhansu->update([
            'gioitinh' => $request->gioitinh,
            'ngaysinh' => $request->ngaysinh,
            'diachi' => $request->diachi,
            'sodienthoai' => $request->sodienthoai,
        ]);

        if ($request->hasFile('hinhanh')) {
            // Xóa ảnh cũ nếu có
            if ($nhansu->hinhanh && file_exists(public_path($nhansu->hinhanh))) {
                unlink(public_path($nhansu->hinhanh));
            }
            $file = $request->file('hinhanh');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/nhansu/'), $fileName);
            $nhansu->update(['hinhanh' => 'uploads/nhansu/' . $fileName]);
        }
    }

    return redirect()->route('profile')->with('success', 'Cập nhật thông tin thành công!');
}



    /**
     * Hiển thị trang profile của người dùng.
     */
    public function index()
    {
        $user = Auth::user();
        $nhansu = NhanSu::where('user_id', $user->id)->first();
        return view('profile.index', compact('user', 'nhansu'));
    }

    /**
     * Hiển thị thông tin của một user theo ID.
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $nhansu = NhanSu::where('user_id', $id)->first();
        return view('profile.index', compact('user', 'nhansu'));
    }

    /**
     * Xóa tài khoản người dùng.
     */
    public function destroy(Request $request)
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        $user = Auth::user();

        Auth::logout();

        // Xóa thông tin nhân sự nếu có
        $nhansu = NhanSu::where('user_id', $user->id)->first();
        if ($nhansu) {
            if ($nhansu->hinhanh && file_exists(public_path($nhansu->hinhanh))) {
                unlink(public_path($nhansu->hinhanh));
            }
            $nhansu->delete();
        }

        // Xóa user
        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
