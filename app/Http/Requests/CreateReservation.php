<?php

namespace App\Http\Requests;

use App\Rules\CheckTableCapacity;
use App\Rules\CheckTableTimeAvailability;
use Illuminate\Foundation\Http\FormRequest;

class CreateReservation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'table_id' => [
                'required',
                'exists:tables,id',
                new CheckTableTimeAvailability($this->from_time, $this->to_time),
                new CheckTableCapacity($this->guest_number)
            ],
            'customer_id' => [
                'required',
                'exists:customers,id'
            ],
            'from_time' => 'required',
            'to_time' => 'required',
            'guest_number' => 'sometimes|required'
        ];
    }
}
