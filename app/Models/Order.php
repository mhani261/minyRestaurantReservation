<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'table_id',
        'reservation_id',
        'customer_id',
        'waiter_id',
        'total',
        'paid',
        'date',
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderDetails::class);
    }

    public function table()
    {
        return $this->belongsTo(Table::class);
    }

    public function meals()
    {
        return $this->hasManyThrough(
            Meal::class,
            OrderDetails::class,
            'order_id',
            'id',
            'id',
            'meal_id'
        );
    }
}
