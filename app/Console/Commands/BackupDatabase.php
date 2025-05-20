<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class BackupDatabase extends Command
{
    protected $signature = 'backup:database';
    protected $description = 'Sao lưu dữ liệu từng bảng vào file JSON riêng';

    public function handle()
    {
        // Danh sách bảng theo thứ tự ưu tiên
        $tables = [
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
            

        ]; // Thay bằng các bảng của bạn

        $backupPath = storage_path('backups/');

        // Tạo thư mục backup nếu chưa có
        if (!File::exists($backupPath)) {
            File::makeDirectory($backupPath, 0777, true);
        }

        // Lấy danh sách tất cả các bảng trong database
        $dbTables = DB::select('SHOW TABLES');
        $dbName = env('DB_DATABASE');

        $allTables = [];
        foreach ($dbTables as $table) {
            $tableName = $table->{"Tables_in_$dbName"} ?? $table->table_name ?? null;
            if ($tableName) {
                $allTables[] = $tableName;
            }
        }

        // Gộp danh sách bảng từ mảng cố định + danh sách lấy từ DB
        $tables = array_unique(array_merge($tables, $allTables));

        foreach ($tables as $tableName) {
            // Kiểm tra nếu bảng có tồn tại trong database không
            if (!in_array($tableName, $allTables)) {
                $this->warn("⚠ Bảng {$tableName} không tồn tại trong database, bỏ qua...");
                continue;
            }

            $data = DB::table($tableName)->get()->toArray(); // Lấy dữ liệu
            $filePath = $backupPath . "/{$tableName}.json"; // Đường dẫn file backup

            File::put($filePath, json_encode($data, JSON_PRETTY_PRINT)); // Lưu file JSON
            $this->info("✅ Đã sao lưu bảng {$tableName} vào {$filePath}");
        }

        $this->info("🎉 Sao lưu database hoàn tất!");
    }
}
