<?php

namespace App\Services;

use App\Models\Reservation;
use App\Models\Table;
use App\Models\WaitList;
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

    public function checkTableCapacity(int $tableId, int $guestNumber)
    {
        return Table::findOrFail($tableId)->capacity < $guestNumber;
    }

    public function putOnWaitList(array $data)
    {
        $table = Table::where('capacity', '>', $data['guest_number'])->first();

        return WaitList::create(
            [
                'table_id' => $table->id,
                'customer_id' => $data['customer_id'],
                'preferred_from_date' => $data['from_time'],
                'preferred_to_date' => $data['to_time'],
                'number_of_guests' => $data['guest_number']
            ]
        );
    }
}
