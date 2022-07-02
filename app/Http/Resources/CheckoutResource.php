<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CheckoutResource extends JsonResource
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
            'reservation' => $this->id,
            'table' => $this->table_id,
            'customer' => $this->customer->name,
            'Grand Total' => round($this->total, 2),
            'After discount' => round($this->paid, 2)
        ];
    }
}
