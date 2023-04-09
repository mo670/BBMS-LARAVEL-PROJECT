<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id','order_id',
        'tottalPrice','invoiceNumber','paymentGetway'

    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class,'customer_id', 'user_id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class,'order_id','id');
    }
}
