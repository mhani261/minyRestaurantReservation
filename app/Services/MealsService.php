<?php

namespace App\Services;

use App\Models\Meal;
use App\Models\Reservation;

class MealsService
{
    public function getAvailableMeals()
    {
        return Meal::where('quantity_available', '>', 0)->get();
    }

    public function create(array $data): Reservation
    {
        return Reservation::create($data);
    }
}
