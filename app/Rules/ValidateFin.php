<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidateFin implements Rule
{
    public $debut = "";
    public $fin = "";
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($debutEnter,$finEnter)
    {
        //
        $this->debut  = $debutEnter;
        $this->fin  = $finEnter;
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
        return $value < $this->debut;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'La date de fin doit être supérieur à la date de début !';
    }
}
