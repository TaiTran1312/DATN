<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    // ⚙️ Tên bảng
    protected $table = 'orders';

    // ⚙️ Khóa chính
    protected $primaryKey = 'order_id';
    public $incrementing = true;
    protected $keyType = 'int';

    // ⚙️ Các cột gán hàng loạt
    protected $fillable = [
        'user_id',
        'payment_gateway_id',
        'payment_date',
        'total_amount',
        'status'
    ];

    // ✅ Quan hệ với người dùng
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    // ✅ Quan hệ với chi tiết đơn hàng
    public function details()
    {
        return $this->hasMany(OrderDetail::class, 'order_id', 'order_id');
    }

    // ✅ Gợi ý thêm nếu có bảng thanh toán riêng
    // public function paymentGateway()
    // {
    //     return $this->belongsTo(PaymentGateway::class, 'payment_gateway_id');
    // }
}
