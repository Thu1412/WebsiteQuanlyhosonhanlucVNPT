<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class NhanSu extends Model
{
    use HasFactory;

    protected $table = 'nhansu';

    protected $fillable = [
        'hoten', 'gioitinh', 'ngaysinh', 'sodienthoai', 'hinhanh',
        'email', 'diachi', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function nhansu()
{
    return $this->belongsTo(Nhansu::class, 'nhansu_id', 'id')->select(['id', 'hoten']);
}
public function certifications()
{
    return $this->hasMany(Certification::class, 'nhansu_id');
}

// Quan hệ 1-n với học vấn
public function educations()
{
    return $this->hasMany(Education::class, 'nhansu_id');
}
}
