<?php

namespace App\Services;

use App\Models\Reservation;

class ReservationService
{
    public function create(array $data): Reservation
    {
        return Reservation::create($data);
    }
}
