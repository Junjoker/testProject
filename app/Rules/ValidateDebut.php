<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidateDebut implements Rule
{

    public $debut = "";
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(string $debutEnter)
    {
        //
        $this->debut  = $debutEnter;
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
        //
        $current_date = date('Y-m-d');
        //  dd($current_date . $value );
        return $current_date <= $this->debut;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'La date début doit être supérieur à la date du jour !';
    }
}
