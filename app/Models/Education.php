<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $table = 'educations';

    protected $fillable = [
        'nhansu_id', // Thêm vào để khớp với database
        'status_id',
        'DateStart',
        'DateEnd',
        'File',
        'StandardTrain',
        'BasisTrain',
        'FormTrain',
        'TypeTrain',
        'DegreeClassific',
        'TitleTrain',
        'EducationLevel',
        'SentStudy',
    ];

    protected $attributes = [
        'StandardTrain' => '',
        'File' => '',
        'BasisTrain' => '',
        'FormTrain' => '',
        'TypeTrain' => '',
        'DegreeClassific' => '',
        'TitleTrain' => '',
        'EducationLevel' => 'không xác định',
        'SentStudy' => 0,
    ];

    // Quan hệ với bảng nhân sự (User hoặc Nhansu)
    public function nhansu()
    {
        return $this->belongsTo(NhanSu::class, 'nhansu_id'); 
    }

    // Quan hệ với bảng Status (nếu có)
    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
}