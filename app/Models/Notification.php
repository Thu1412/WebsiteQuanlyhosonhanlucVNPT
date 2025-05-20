<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_id',
        'nhansu_id',
        'type',
        'message',
        'is_read',
        'is_processed',
    ];
    public function nhansu()
{
    return $this->belongsTo(Nhansu::class, 'nhansu_id'); // Liên kết với bảng nhansu qua nhansu_id
}

public function sender()
{
    return $this->belongsTo(User::class, 'sender_id');
}
}
