<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\Room;

class OrderDetail extends Model
{
    protected $primaryKey = 'order_detail_id';
    protected $fillable = ['order_id', 'room_id', 'checkin_date', 'checkout_date', 'amount', 'status', 'booking_date'];

    public function order() {
        return $this->belongsTo(Order::class, 'order_id', 'order_id');
    }

    public function room() {
        return $this->belongsTo(Room::class, 'room_id', 'room_id');
    }
}
