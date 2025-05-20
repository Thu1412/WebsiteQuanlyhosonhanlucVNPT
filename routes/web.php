<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\JoinProjectController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\NhanSuController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaiKhoanController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserProfileController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::resource('certificates', CertificateController::class);
Route::resource('nhansu', NhanSuController::class);
Route::resource('trainings', TrainingController::class);Route::get('/', function () {
    return view('welcome');
});
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/login', [LoginController::class, 'index'])->name('home.login');
Route::get('/universities_data.json', [EducationController::class, 'getUniversitiesFromJson']);
Route::get('/home/doimatkhau/{token?}', [NewPasswordController::class, 'create'])->name('home.doimatkhau');

/*
|--------------------------------------------------------------------------
| Authenticated User Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // User profile
    Route::get('/profile', [UserProfileController::class, 'index'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [UserProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/{id}', [UserProfileController::class, 'show'])->name('profile.show');

    // Nhân sự
    Route::resource('nhansu', NhanSuController::class);
    Route::post('/nhansu/{id}/update', [NhanSuController::class, 'update'])->name('nhansu.update');

    // Học vấn
    Route::resource('educations', EducationController::class);
    Route::get('/education/export/{id}', [EducationController::class, 'exportToWord'])->name('education.export');
    Route::get('/hocvannhansu', [EducationController::class, 'HocVanNhanSu'])->name('hocvannhansu');

    // Chứng chỉ
    Route::resource('certificates', CertificateController::class);
    Route::get('/certificates/export/{id}', [CertificateController::class, 'exportCertificateToWord'])->name('certificates.export');
    Route::get('/chungchinhansu', [CertificateController::class, 'ChungChiNhanSu'])->name('chungchinhansu');

    // Dự án
    Route::resource('join-projects', JoinProjectController::class);
    Route::get('/thamgiaduannhansu', [JoinProjectController::class, 'ThamGiaDuAnNhanSu'])->name('thamgiaduannhansu');

    // Đào tạo
    Route::get('/daotaonhansu', [TrainingController::class, 'DaoTaoNhanSu'])->name('daotaonhansu');
    Route::get('/daotao', function () {
        return redirect()->route('daotaonhansu');
    });

    // Tài khoản
    Route::resource('taikhoan', TaiKhoanController::class);

    // Người dùng
    Route::get('/user', [UserController::class, 'index'])->name('user.index');

    // Thông báo
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::post('/notifications', [NotificationController::class, 'store'])->name('notifications.store');
    Route::get('/notifications/staff', [NotificationController::class, 'NhansushowAllNotifications'])->name('notifications.staff');
    Route::get('/notifications/staff_all', [NotificationController::class, 'NhansushowAllNotifications'])->name('notifications.staff_all');
    Route::get('/request-edit/{type}/{id}', [NotificationController::class, 'showForm'])->name('request.edit.form');
    Route::post('/request-edit/send', [NotificationController::class, 'sendRequest'])->name('request.edit.send');
    Route::get('/notifications/all', [NotificationController::class, 'showAllNotifications'])->name('notifications.all');
    Route::put('/notifications/{id}/process', [NotificationController::class, 'process'])->name('notifications.process');
    Route::delete('/notifications/delete/{notification}', [NotificationController::class, 'deleteNotification'])->name('notifications.delete');
    Route::get('/notifications/{id}', [NotificationController::class, 'redirectToNotification'])->name('notifications.redirect');
    Route::post('/notifications/respond/{id}', [NotificationController::class, 'respond'])->name('notifications.respond');
});

/*
|--------------------------------------------------------------------------
| Admin Routes (Only for Admins)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', App\Http\Middleware\AdminMiddleware::class])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/notification/{id}', [NotificationController::class, 'viewDetail'])->name('admin.notification.detail');
    Route::get('/admin/certificates/{id}/edit', [CertificateController::class, 'edit'])->name('admin.certificates.edit');
    Route::get('/admin/educations/{id}/edit', [EducationController::class, 'edit'])->name('admin.educations.edit');
});

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';
