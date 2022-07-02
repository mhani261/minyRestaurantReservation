<?php

namespace App\Http\Requests;

use App\Models\Reservation;
use App\Rules\CheckMealAvailability;
use Illuminate\Foundation\Http\FormRequest;

class PlaceOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $reservation = Reservation::Query()
            ->where('table_id', $this->table_id)
            ->where('customer_id', $this->customer_id)
            ->latest()
            ->first();

        return $reservation->id == $this->reservation_id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'table_id' => 'required',
            'customer_id' => 'required',
            'reservation_id' => [
                'required',
                'exists:reservations,id'
            ],
            'meals.*.id' => [
                'required',
                'integer',
                'exists:meals,id',
                new CheckMealAvailability()
            ],
        ];
    }
}
