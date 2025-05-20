<?php

namespace App\Observers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class BackupObserver
{
    public function backupDatabase()
    {
        $backupPath = storage_path('backups/');
        if (!File::exists($backupPath)) {
            File::makeDirectory($backupPath, 0777, true);
        }

        // Lấy danh sách bảng từ MySQL
        $tables = DB::select('SHOW TABLES');
        $dbName = env('DB_DATABASE');
        $key = "Tables_in_" . $dbName;

        foreach ($tables as $table) {
            $tableName = $table->$key;
            $data = DB::table($tableName)->get()->toArray();
            $filePath = $backupPath . "/{$tableName}.json";

            File::put($filePath, json_encode($data, JSON_PRETTY_PRINT));
        }
    }

    public function created($model) { $this->backupDatabase(); }
    public function updated($model) { $this->backupDatabase(); }
    public function deleted($model) { $this->backupDatabase(); }
}
