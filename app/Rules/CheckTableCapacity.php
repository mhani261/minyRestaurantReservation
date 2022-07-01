<?php

namespace App\Rules;

use App\Models\Table;
use Illuminate\Contracts\Validation\Rule;

class CheckTableCapacity implements Rule
{
    protected $capacity;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($capacity)
    {
        $this->capacity = $capacity;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return Table::findOrFail($value)->capacity >= $this->capacity;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The table capacity is smaller than guest numbers';
    }
}
