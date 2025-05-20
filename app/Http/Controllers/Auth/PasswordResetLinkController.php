<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Kiểm tra email hợp lệ
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        // Gửi link reset mật khẩu
        $status = Password::sendResetLink(
            $request->only('email')
        );

        // Kiểm tra trạng thái và phản hồi cho người dùng
        return $status == Password::RESET_LINK_SENT
            ? back()->with('status', __($status))  // Thành công
            : back()->withInput($request->only('email'))  // Thất bại
                ->withErrors(['email' => __($status)]);
    }
}
