<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'phone_number',
        'address',
        'info_for_shipper'
    ];

    protected $hidden = [
        'user_id'
    ];
}