<?php

namespace App\Http\Controllers\Administracao;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administracao\UsuarioRequest;
use App\Models\Administracao\Perfil;
use App\Models\Administracao\PessoaFisica;
use App\Models\Administracao\Usuario;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class UsuarioController extends Controller
{
    public function index(): View
    {
        $perPage = 10;
        $keyword = empty($request->search) ? '' : $request->search;

        $usuarios = User::buscar($perPage, $keyword);
        return view('administracao.usuario.index', compact('usuarios'));
    }

    public function create(): View
    {
        $perfis = Perfil::all();
        return view('administracao.usuario.create', compact('perfis'));
    }

    public function store(UsuarioRequest $request): Response
    {
        DB::beginTransaction();
        $usuario = User::create($request->all());
        if (!$usuario) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Erro ao cadastrar usuário');
        }

        if (!$usuario->pessoaFisica()->create($request->all())) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Erro ao cadastrar usuário');
        }

        DB::commit();
        return redirect()->route('usuario.index')->with('success', 'Usuário cadastrado com sucesso');
    }

    public function edit(User $usuario): View
    {
        $perfis = Perfil::all();
        return view('administracao.usuario.edit', compact('usuario', 'perfis'));
    }

    public function update(UsuarioRequest $request, User $usuario): Response
    {
        DB::beginTransaction();

        if (!$usuario->update($request->all())) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Erro ao atualizar usuário');
        }

        DB::commit();
        return redirect()->route('usuario.index')->with('success', 'Usuário atualizado com sucesso');
    }

    public function destroy(User $usuario): Response
    {
        DB::beginTransaction();

        if (!$usuario->update(['status' => 'inativo'])) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Erro ao excluir usuário');
        }

        DB::commit();
        return redirect()->route('usuario.index')->with('success', 'Usuário excluído com sucesso');
    }
}
