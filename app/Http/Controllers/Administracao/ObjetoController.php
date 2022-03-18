<?php

namespace App\Http\Controllers\Administracao;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administracao\ObjetoRequest;
use App\Models\Administracao\Objeto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class ObjetoController extends Controller
{
    public function index(Request $request): View
    {
        $perPage = 10;
        $keyword = empty($request->search) ? '' : $request->search;

        $objetos = Objeto::buscar($perPage, $keyword);
        return view('administracao.objeto.index', compact('objetos'));
    }

    public function create(): View
    {
        return view('administracao.objeto.create');
    }

    public function store(ObjetoRequest $request): Response
    {
        DB::beginTransaction();
        if (!Objeto::create($request->all())) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Erro ao cadastrar objeto!');
        }
        DB::commit();
        return redirect()->route('objeto.index')
            ->with('success', 'Objeto cadastrado com sucesso!');
    }

    public function edit(Objeto $objeto): View
    {
        return view('administracao.objeto.edit', compact('objeto'));
    }

    public function update(ObjetoRequest $request, Objeto $objeto): Response
    {
        DB::beginTransaction();
        if (!$objeto->update($request->all())) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Erro ao atualizar objeto!');
        }
        DB::commit();
        return redirect()->route('objeto.index')
            ->with('success', 'Objeto atualizado com sucesso!');
    }

    public function destroy(Objeto $objeto)
    {
        DB::beginTransaction();
        if (!$objeto->update(['status' => 'inativo', 'user_alteracao_id' => auth()->user()->id])) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Erro ao excluir objeto!');
        }
        DB::commit();
        return redirect()->route('objeto.index')->with('success', 'Objeto excluído com sucesso!');
    }
}
