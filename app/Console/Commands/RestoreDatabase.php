<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class RestoreDatabase extends Command
{
    protected $signature = 'restore:database';
    protected $description = 'Khôi phục dữ liệu từ file JSON vào database';

    public function handle()
    {
        $backupPath = storage_path('backups/');

        if (!File::exists($backupPath)) {
            $this->error("❌ Thư mục backup không tồn tại!");
            return;
        }

        // 🛑 Tắt kiểm tra khóa ngoại
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

        // 🌟 Thứ tự khôi phục dữ liệu (ưu tiên bảng chính trước)
        $restoreOrder = [
            'users',
            'nhansu',
            'status',
            'certificates',
            'educations',
            'trainings',
            'join_projects',
            'thong_baos',
            'notifications',
            'cache',
            'cache_locks',
            'failed_jobs',
            'job_batches',
            'jobs',
            'migrations',
            'password_reset_tokens',
            'sessions'
        ];

        foreach ($restoreOrder as $tableName) {
            $filePath = $backupPath . $tableName . '.json';

            if (File::exists($filePath)) {
                $jsonData = File::get($filePath);
                $data = json_decode($jsonData, true);

                if (!empty($data)) {
                    DB::table($tableName)->truncate(); // Xóa dữ liệu cũ
                    DB::table($tableName)->insert($data); // Khôi phục dữ liệu mới
                    $this->info("✅ Đã khôi phục dữ liệu cho bảng {$tableName}");
                } else {
                    $this->warn("⚠️ Không có dữ liệu để khôi phục cho bảng {$tableName}");
                }
            } else {
                $this->warn("⚠️ Không tìm thấy file backup cho bảng {$tableName}");
            }
        }

        // ✅ Bật lại kiểm tra khóa ngoại
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

        $this->info("🎉 Khôi phục dữ liệu hoàn tất!");
    }
}
