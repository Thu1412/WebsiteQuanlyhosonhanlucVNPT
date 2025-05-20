<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Certificate;

class Training extends Model
{
    use HasFactory;

    protected $table = 'trainings'; // Đảm bảo đúng tên bảng

    protected $fillable = [
        'status_id', 'DateStart', 'DateEnd', 'Unit',
        'JobTitle', 'CourseTrain', 'OrganizeForm', 'UnitTrain',
        'ContentCommit', 'ResultTrain', 'ResultSubject', 'Status',
        'Score', 'CostTrain', 'TimeCommit', 'TimeCommitRemain', 
        'IssueCertificate', 'Contract', 'nhansu_id'
    ];

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function nhansu()
    {
        return $this->belongsTo(Nhansu::class, 'nhansu_id', 'id');
    }
    public function certificate()
    {
        return $this->hasOne(Certificate::class, 'nhansu_id', 'nhansu_id');
    }
    protected static function boot()
    {
        parent::boot();

        static::saved(function ($training) {
            if ($training->IssueCertificate) {
                Certificate::updateOrCreate(
                    [
                        'nhansu_id' => $training->nhansu_id,
                        'DateStart' => $training->DateStart,
                        'DateEnd' => $training->DateEnd
                    ],
                    [
                        'status_id' => $training->status_id,
                        'DegreeCertificate' => 'Chứng chỉ đào tạo',
                        'TypeCertificate' => 'Chuyên môn',
                        'FieldCertificate' => $training->CourseTrain,
                        'LevelCertificate' => 'Nâng cao',
                        'BasisTrain' => $training->UnitTrain,
                        'LocationTrain' => 'Không xác định',
                        'Classification' => 'Đạt',
                        'Score' => $training->Score,
                        'SentStudy' => 1,
                        'InternationalCertificate' => 0,
                        'nhansu_id' => $training->nhansu_id
                    ]
                );
            }
        });
    }
}
