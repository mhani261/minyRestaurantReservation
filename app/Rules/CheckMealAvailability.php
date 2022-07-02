<?php

namespace App\Rules;

use App\Models\Meal;
use Illuminate\Contracts\Validation\Rule;

class CheckMealAvailability implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return Meal::findOrFail($value)->quantity_available > 0;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Sorry, this meal not longer available';
    }
}
