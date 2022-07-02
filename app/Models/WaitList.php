<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaitList extends Model
{
    use HasFactory;

    protected $fillable = ['table_id', 'customer_id', 'preferred_from_date', 'preferred_to_date', 'number_of_guests'];
}
