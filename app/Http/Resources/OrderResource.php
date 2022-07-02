<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    public static $wrap = 'order';

    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'tableId' => $this->table_id,
            'customerId' => $this->customer_id,
            'reservationId' => $this->reservation_id,
            'date' => $this->date
        ];
    }
}
