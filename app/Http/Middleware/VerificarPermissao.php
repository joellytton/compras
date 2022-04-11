<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerificarPermissao
{
    public function handle(Request $request, Closure $next, $arrayPerfil)
    {
        //verificar ser o usuario é administrador
        if (Auth::user()->perfil_id == 1) {
            return $next($request);
        }
        $arrayPerfil = explode(',', $arrayPerfil);
        if (!in_array(Auth::user()->perfil_id, $arrayPerfil)) {
            return redirect()->route('dashboard')->with('alert', "Você não tem permissão para essa ação.");
        }
        return $next($request);
    }
}
