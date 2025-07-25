<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Service;
use App\Models\TypeRoom as RoomType;

class Room extends Model
{
    protected $table = 'rooms';
    protected $primaryKey = 'room_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
    'room_type_id',
    'name',
    'description',
    'price',
    'max_guests',
    'type',
    'status',
    'image'
    ];

    // Quan hệ với bảng TypeRoom
    public function roomType()
    {
        return $this->belongsTo(RoomType::class, 'room_type_id', 'room_type_id');
    }

    // Quan hệ với bảng Services qua bảng trung gian room_service
    public function services()
    {
        return $this->belongsToMany(Service::class, 'room_service', 'room_id', 'service_id');
    }

    // Accessor giúp Vue đọc trực tiếp room_type_name
    public function getRoomTypeNameAttribute()
    {
        return $this->TypeRoom->name ?? null;
    }
}
