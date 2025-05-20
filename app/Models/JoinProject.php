<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class JoinProject extends Model
{
    use HasFactory;

    protected $table = 'join_projects'; // Đảm bảo đúng tên bảng

    protected $fillable = [
        'nhansu_id', 'status_id', 'DateStart', 'DateEnd',
        'ProductName', 'Description'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // Đảm bảo cột 'user_id' tồn tại trong bảng join_projects
    }
    public function nhansu()
    {
        return $this->belongsTo(NhanSu::class, 'nhansu_id'); // Sửa lại cho đúng với database
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
}
