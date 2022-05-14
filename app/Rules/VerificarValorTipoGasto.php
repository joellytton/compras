<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class VerificarValorTipoGasto implements Rule
{
   
    public function __construct()
    {
        //
    }


    public function passes($attribute, $value)
    {
        foreach ($value as $valor) {
            if ($valor == 0) {
                return false;
            }
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
