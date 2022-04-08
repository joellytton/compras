<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerificarPermissao
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, array $arrayPerfil)
    {
        //verificar ser o usuario é administrador
        if (Auth::user()->id_perfil == 1) {
            return $next($request);
        }
        $arrayPerfil = explode(',', $arrayPerfil);
        if (!in_array(Auth::user()->id_perfil, $arrayPerfil)) {
            return redirect()->route('dashboard')->with('alert', "Você não tem permissão para essa ação.");
        }

        return $next($request);
    }
}
