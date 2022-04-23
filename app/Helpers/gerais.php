<?php
if (!function_exists('data_br_para_iso')) {
    function data_br_para_iso($data)
    {
        return DateTime::createFromFormat('d/m/Y', $data)->format('Y-m-d');
    }
}

if (!function_exists('data_iso_para_br')) {
    function data_iso_para_br($data)
    {
        return (new DateTime($data))->format('d/m/Y');
    }
}

if (!function_exists('numero_iso_para_br')) {
    function numero_iso_para_br($numero)
    {
        return number_format($numero, '2', ',', '.');
    }
}


if (!function_exists('numero_br_para_iso')) {
    function numero_br_para_iso($numero)
    {
        return str_replace(['.', ','], ['', '.'], $numero);
    }
}
