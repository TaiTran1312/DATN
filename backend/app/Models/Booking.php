<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'bookings';
    protected $primaryKey = 'booking_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'room_id',
        'customer_name',
        'customer_email',
        'check_in',
        'check_out',
        'status'
    ];

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }
}
