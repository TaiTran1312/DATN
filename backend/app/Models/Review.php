<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class Review extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'review_id';

    protected $fillable = [
        'user_id', 'room_id', 'order_id', 'rating', 'content'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
