<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
}
