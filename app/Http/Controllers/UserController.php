<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // Lấy thông tin user đăng nhập

        // Lấy số lượng chứng chỉ
        $cert_count = DB::table('certificates')
                        ->where('nhansu_id', $user->nhansu_id)
                        ->count();

        // Lấy số lượng trainings
        $trainings_count = DB::table('trainings')
                        ->where('nhansu_id', $user->nhansu_id)
                        ->count();

        // Lấy số lượng dự án tham gia
        $join_projects_count = DB::table('join_projects')
                        ->where('nhansu_id', $user->nhansu_id)
                        ->count();

        // Lấy số lượng trình độ học vấn từ bảng educations
        $educations_count = DB::table('educations')
                        ->where('nhansu_id', $user->nhansu_id)
                        ->count();

        return view('users.index', compact('cert_count', 'trainings_count', 'join_projects_count', 'educations_count'));
    }
}
