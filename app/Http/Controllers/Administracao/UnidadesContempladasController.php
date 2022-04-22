<?php

namespace App\Http\Controllers\Administracao;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administracao\UnidadeContempladaRequest;
use App\Models\Administracao\UnidadesContempladas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class UnidadesContempladasController extends Controller
{
    public function index(Request $request): View
    {
        $perPage = 10;
        $keyword = empty($request->search) ? '' : $request->search;

        $unidades = UnidadesContempladas::buscar($perPage, $keyword);

        return view('administracao.unidades_contempladas.index', compact('unidades'));
    }

    public function create(): View
    {
        return view('administracao.unidades_contempladas.create');
    }

    public function store(UnidadeContempladaRequest $request): Response
    {
        DB::beginTransaction();

        if (!UnidadesContempladas::create($request->all())) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Erro ao cadastrar unidade contemplada!');
        }

        DB::commit();

        return redirect()->route('unidadeContempladas.index')
            ->with('success', 'Unidade Contemplada cadastrada com sucesso!');
    }

    public function edit(UnidadesContempladas $unidadeContempladas): View
    {
        return view('administracao.unidades_contempladas.edit', compact('unidadeContempladas'));
    }

    public function update(UnidadeContempladaRequest $request, UnidadesContempladas $unidadeContempladas)
    {
        DB::beginTransaction();


        if (!$unidadeContempladas->update($request->all())) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Falha ao atualizar um tipo de gasto!');
        }

        DB::commit();


        return redirect()->route('unidadeContempladas.index')
            ->with('success', 'Unidade Contemplada atualizada com sucesso!');
    }

    public function destroy(UnidadesContempladas $unidadeContempladas): Response
    {
        DB::beginTransaction();

        if (!$unidadeContempladas->update(['status' => 'inativo', 'user_alteracao_id' => auth()->user()->id])) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Falha ao excluir unidade contemplada!');
        }

        DB::commit();

        return redirect()->route('unidadeContempladas.index')
            ->with('success', 'Unidade Contemplada excluída com sucesso!');
    }
}
