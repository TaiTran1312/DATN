<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeRoom extends Model
{
    protected $table = 'room_types'; // nếu tên model không khớp với tên bảng
    protected $primaryKey = 'room_type_id';

    protected $fillable = [
        'name',
        'description',
        'price'
    ];

    // Nếu cần, bạn có thể thêm quan hệ
    public function rooms()
    {
        return $this->hasMany(Room::class, 'room_type_id');
    }
}
