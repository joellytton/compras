<?php

namespace App\Http\Controllers\Administracao;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administracao\SituacaoAcompanhamentoRequest;
use App\Models\Administracao\SituacaoAcompanhamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class SituacaoAcompanhamentoController extends Controller
{
    public function index(Request $request): View
    {
        $perPage = 10;
        $keyword = empty($request->search) ? '' : $request->search;
        $situacoes = SituacaoAcompanhamento::buscar($perPage, $keyword);

        return view('administracao.situacao-acompanhamento.index', compact('situacoes'));
    }

    public function create(): View
    {
        return view('administracao.situacao-acompanhamento.create');
    }

    public function store(SituacaoAcompanhamentoRequest $request): Response
    {
        DB::beginTransaction();

        if (!SituacaoAcompanhamento::create($request->all())) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Falha ao cadastrar situação de acompanhamento!');
        }

        DB::commit();
        return redirect()->route('situacao.index')
            ->with('success', 'Situação de acompanhamento cadastrada com sucesso!');
    }

    public function edit(SituacaoAcompanhamento $situacao): View
    {
        return view('administracao.situacao-acompanhamento.edit', compact('situacao'));
    }

    public function update(SituacaoAcompanhamentoRequest $request, SituacaoAcompanhamento $situacao): Response
    {
        DB::beginTransaction();

        if (!$situacao->update($request->all())) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Falha ao atualizar situação de acompanhamento!');
        }

        DB::commit();
        return redirect()->route('situacao.index')
            ->with('success', 'Situação de acompanhamento atualizada com sucesso!');
    }

    public function destroy(SituacaoAcompanhamento $situacao): Response
    {
        DB::beginTransaction();

        if (!$situacao->update(['status' => 'inativo', 'user_alteracao_id' => auth()->user()->id])) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Falha ao excluir situação de acompanhamento!');
        }

        DB::commit();
        return redirect()->route('situacao.index')
            ->with('success', 'Situação de acompanhamento excluída com sucesso!');
    }
}
