<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    protected $table = 'certificates'; // Đảm bảo đúng tên bảng

    protected $fillable = [
        'status_id',
        'DateStart',
        'DateEnd',
        'DegreeCertificate',
        'TypeCertificate',
        'File',
        'FieldCertificate',
        'LevelCertificate',
        'BasisTrain',
        'LocationTrain',
        'Classification',
        'Score',
        'SentStudy',
        'InternationalCertificate',
        'nhansu_id'
    ];

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function nhansu()
    {
        return $this->belongsTo(Nhansu::class, 'nhansu_id'); // Nếu dùng bảng users, đổi 'Nhansu' thành 'User'
    }
}