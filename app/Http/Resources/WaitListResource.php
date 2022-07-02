<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WaitListResource extends JsonResource
{
    public static $wrap = 'reservation';

    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'waitListId' => $this->id,
            'table' => $this->table_id,
            'customer' => $this->customer_id,
            'preferredFromTime' => $this->preferred_from_date,
            'preferredToTime' => $this->preferred_to_date,
        ];
    }
}
