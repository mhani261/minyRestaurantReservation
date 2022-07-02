<?php

namespace App\Services;

use App\Models\Reservation;
use Illuminate\Support\Collection;

class ReservationService
{
    public function create(array $data): Reservation
    {
        return Reservation::create($data);
    }

    public function get(): Collection
    {
        return Reservation::all();
    }
}
