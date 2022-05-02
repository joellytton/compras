<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class verificarValorTipoGasto implements Rule
{
   
    public function __construct()
    {
        //
    }


    public function passes($attribute, $value)
    {
        if ($value > 0) {
            return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'O valor do tipo de gasto tem que ser maior que 0.';
    }
}
