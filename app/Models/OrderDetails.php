<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;

    protected $fillable =
        [
            'order_id',
            'meal_id',
            'amount_to_pay'
        ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
