<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable=[
        'customer_id','package_id',
        'payment','status'
    ];


    public function package()
    {
        return $this->hasOne(Package::class,'id','package_id');
    }
    public function invoice()
    {
        return $this->hasOne(Invoice::class,'order_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class,'customer_id','user_id');
    }
}
