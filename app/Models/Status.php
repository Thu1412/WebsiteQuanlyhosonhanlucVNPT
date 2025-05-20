<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $table = 'status'; // Đảm bảo tên bảng đúng với database

    protected $fillable = ['name']; // Thêm các cột cần thiết

    public function joinProjects()
    {
        return $this->hasMany(JoinProject::class, 'status_id');
    }
}

