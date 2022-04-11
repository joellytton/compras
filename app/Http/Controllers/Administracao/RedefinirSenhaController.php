<?php

namespace App\Http\Controllers\Administracao;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RedefinirSenhaController extends Controller
{
    public function redefinirSenhaParaSenhaPadrao(Request $request)
    {
        $usuario = User::with('pessoaFisica')->findOrFail($request->usuario);
        $usuario->password = Hash::make($usuario->pessoaFisica->cpf);
        $usuario->save();

        return redirect()->back()->with('success', 'Senha redefinida com sucesso!');
    }
}
