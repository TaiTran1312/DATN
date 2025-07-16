<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable implements MustVerifyEmail, CanResetPasswordContract
{
    use HasApiTokens, HasFactory, Notifiable, CanResetPassword, SoftDeletes;

    // Khai báo bảng và khóa chính
    protected $table = 'users';
    protected $primaryKey = 'user_id';
    public $incrementing = true;
    protected $keyType = 'int';

    // Các trường có thể gán tự động
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'avatar',
        'address',
        'role',
        'status'
    ];

    // Ẩn khi trả JSON
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Định dạng kiểu dữ liệu
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Quan hệ 1 - nhiều: Bài viết
    public function posts()
    {
        return $this->hasMany(Post::class, 'user_id', 'user_id');
    }

    // Quan hệ 1 - nhiều: Đánh giá
    public function reviews()
    {
        return $this->hasMany(Review::class, 'user_id', 'user_id');
    }

    // Quan hệ 1 - nhiều: Thông báo
    public function notifications()
    {
        return $this->hasMany(Notification::class, 'user_id', 'user_id');
    }

    // Quan hệ 1 - nhiều: Đơn đặt phòng (nếu có)
    public function bookings()
    {
        return $this->hasMany(Booking::class, 'user_id', 'user_id');
    }

    // Quan hệ 1 - nhiều: Bình luận (nếu dùng)
    public function comments()
    {
        return $this->hasMany(Comment::class, 'user_id', 'user_id');
    }
}
