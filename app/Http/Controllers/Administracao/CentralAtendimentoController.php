<?php

namespace App\Http\Controllers\Administracao;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administracao\CentralAtendimentoRequest;
use App\Models\Administracao\CentralAtendimento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class CentralAtendimentoController extends Controller
{
    public function index(Request $request): View
    {
        $perPage = 10;
        $keyword = empty($request->search) ? '' : $request->search;
        $centrais = CentralAtendimento::buscar($perPage, $keyword);

        return view('administracao.central-atendimento.index', compact('centrais'));
    }

    public function create(): View
    {
        return view('administracao.central-atendimento.create');
    }

    public function store(CentralAtendimentoRequest $request): Response
    {
        DB::beginTransaction();

        if (!CentralAtendimento::create($request->all())) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Falha ao cadastrar central de atendimento!');
        }

        DB::commit();
        return redirect()->route('centralAtendimento.index')
            ->with('success', 'Central de atendimento cadastrada com sucesso!');
    }


    public function edit(CentralAtendimento $centralAtendimento): View
    {
        return view('administracao.central-atendimento.edit', compact('centralAtendimento'));
    }

    public function update(CentralAtendimentoRequest $request, CentralAtendimento $centralAtendimento): Response
    {
        DB::beginTransaction();

        if (!$centralAtendimento->update($request->all())) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Falha ao atualizar central de atendimento!');
        }

        DB::commit();
        return redirect()->route('centralAtendimento.index')
            ->with('success', 'Central de atendimento atualizada com sucesso!');
    }

    public function destroy(CentralAtendimento $centralAtendimento): Response
    {
        DB::beginTransaction();

        if (!$centralAtendimento->update(['status' => 'inativo', 'user_alteracao_id' => auth()->user()->id])) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Falha ao excluir central de atendimento!');
        }

        DB::commit();
        return redirect()->route('centralAtendimento.index')
            ->with('success', 'Central de atendimento excluída com sucesso!');
    }
}
