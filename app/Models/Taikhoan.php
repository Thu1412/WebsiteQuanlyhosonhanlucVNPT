<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Taikhoan extends Authenticatable
{
    use HasFactory;

    protected $table = 'users'; // Đảm bảo đúng tên bảng

    protected $fillable = [
        'name', 'email', 'password','plain_password', 'role', 'status', 'nhansu_id'
    ];

    protected $hidden = [
        'password', 'remember_token'
    ];

    public function nhansu()
    {
        return $this->belongsTo(Nhansu::class, 'nhansu_id'); // Nếu dùng bảng users, đổi 'Nhansu' thành 'User'
    }
}