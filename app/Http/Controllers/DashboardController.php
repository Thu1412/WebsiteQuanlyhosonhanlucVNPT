<?php

namespace App\Http\Controllers;
use App\Models\Certificate;
use App\Models\JoinProject;
use App\Models\Training;
use App\Models\Notification;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    { 
        $notifications = Notification::where('is_read', false)->get();
        $nhansu = DB::table('nhansu')->count();
        $users = DB::table('users')->count();
        $educations = DB::table('educations')->count();
        $joinProjects = DB::table('join_projects')->count();
        $certificates = DB::table('certificates')->count();
        $trainings = DB::table('trainings')->count();
        $newNhansu = DB::table('nhansu')
        ->whereMonth('created_at', date('m'))
        ->whereYear('created_at', date('Y'))
        ->count();


        $ongoingStatusId = DB::table('status')->where('name', 'Đang diễn ra')->value('id');
        $activeStatusId = DB::table('status')->where('name', 'Đang diễn ra')->value('id');
        $ongoingTrainings = DB::table('trainings')
        ->where('status_id', $ongoingStatusId)
        ->count();


        //$certificatesIssued = DB::table('certificates')
          //  ->whereYear('issued_date', date('Y'))
           // ->count();

           $activeProjects = DB::table('join_projects')
           ->where('status_id', $activeStatusId)
           ->count();

           $issuedCertificates = DB::table('certificates')->where('status_id', 'Hoàn thành')->count();
           $completedProjects = DB::table('join_projects')->where('status_id', 'Hoàn thành')->count();
           $issuedCertificates = Certificate::count(); // Đếm số chứng chỉ đã cấp
           $completedProjects = JoinProject::where('status_id', '2')->count(); // Đếm số dự án đã hoàn thành
           $completedTrainings = Training::where('status_id', '2')->count(); // Đếm số khóa đào tạo đã hoàn thành
           $employeesInProjects = JoinProject::count(); // Đếm số nhân sự đã tham gia dự án

        return view('dashboard', [
            'nhansu' => $nhansu,
            'users' => $users,
            'educations' => $educations,
            'joinProjects' => $joinProjects,
            'certificates' => $certificates,
            'trainings' => $trainings,
            'newNhansu' => $newNhansu,
            'ongoingTrainings' => $ongoingTrainings,
           // 'certificatesIssued' => $certificatesIssued,
            'activeProjects' => $activeProjects,
            'issuedCertificates' => $issuedCertificates,
            'completedProjects' => $completedProjects,
            'completedTrainings' => $completedTrainings,
            'employeesInProjects' => $employeesInProjects,
            'notifications' => $notifications
        ]);
    }
}
