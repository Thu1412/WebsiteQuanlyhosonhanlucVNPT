<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB; // ✅ THÊM DÒNG NÀY
use Illuminate\Database\Eloquent\Model;
use App\Observers\BackupObserver;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
{
    View::composer('layouts.app', function ($view) {
        if (Auth::check()) {
            $user = Auth::user();
            $notifications = \App\Models\Notification::where('nhansu_id', $user->id)->get();
            $view->with('notifications', $notifications);
        } else {
            $view->with('notifications', collect());
        }
    });
    $dbName = env('DB_DATABASE');
    $key = "Tables_in_" . $dbName;

    // Truy vấn danh sách bảng
    $tables = DB::select("SHOW TABLES");

    foreach ($tables as $table) {
        if (!isset($table->$key)) {
            continue; // Bỏ qua nếu không có key
        }

        $tableName = $table->$key;
        $modelClass = "App\\Models\\" . ucfirst($tableName);

        if (class_exists($modelClass) && is_subclass_of($modelClass, Model::class)) {
            $modelClass::observe(BackupObserver::class);
        }
    }
}
}
