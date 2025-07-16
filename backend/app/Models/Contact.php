<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $primaryKey = 'contact_id';

    protected $fillable = [
        'name',
        'email',
        'subject',
        'message'
    ];
}
