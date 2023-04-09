<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'name',
        'about',
        'image',
        'company',
        'mobile',
        'address',
        't_profile',
        'f_profile',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class,'customer_id');
    }
   
}

