<?php

namespace App\Rules;

use App\Models\Reservation;
use Illuminate\Contracts\Validation\Rule;

class CheckTableTimeAvailability implements Rule
{
    protected $from_time;
    protected $to_time;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($from_time, $to_time)
    {
        $this->from_time = $from_time;
        $this->to_time = $to_time;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $from = $this->from_time;
        $to = $this->to_time;

        $conflict = Reservation::query()
            ->where('table_id', $value)
            ->where(function ($query) use ($from, $to) {
                $query->where(function ($query) use ($from) {
                    $query->where('from_time', '<=', $from)
                        ->where('to_time', '>=', $from);
                })
                    ->orWhere(function ($query) use ($to) {
                        $query->where('from_time', '<=', $to)
                            ->where('to_time', '>=', $to);
                    });
            })
            ->exists();

        return !$conflict;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'This Time is already reserved before';
    }
}
