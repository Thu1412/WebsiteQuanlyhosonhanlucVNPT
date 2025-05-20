<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThongBao extends Model
{
    use HasFactory;

    protected $table = 'thong_baos'; // Đảm bảo trỏ đúng đến bảng trong database
    protected $fillable = ['user_id', 'title', 'message', 'is_read'];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
