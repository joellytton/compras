<?php

namespace App\Http\Controllers\Administracao;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administracao\ModalidadeRequest;
use App\Models\Administracao\Modalidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class ModalidadeController extends Controller
{
    public function __construct()
    {
        $this->middleware('verificar.permissao:2', ['except' => []]);
    }

    public function index(Request $request): View
    {
        $perPage = 10;
        $keyword = empty($request->search) ? '' : $request->search;

        $modalidades = Modalidade::buscar($perPage, $keyword);
        return view('administracao.modalidade.index', compact('modalidades'));
    }

    public function create(): View
    {
        return view('administracao.modalidade.create');
    }

    public function store(ModalidadeRequest $request): Response
    {
        DB::beginTransaction();

        if (!Modalidade::create($request->all())) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Erro ao cadastrar uma modalidade!');
        }

        DB::commit();
        return redirect()->route('modalidade.index')
            ->with('success', 'Modalidade cadastrada com sucesso!');
    }

    public function edit(Modalidade $modalidade): View
    {
        return view('administracao.modalidade.edit', compact('modalidade'));
    }

    public function update(ModalidadeRequest $request, Modalidade $modalidade): Response
    {
        DB::beginTransaction();

        if (!$modalidade->update($request->all())) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Erro ao cadastrar área de abrangência!');
        }

        DB::commit();
        return redirect()->route('modalidade.index')
            ->with('success', 'Modalidade alterada com sucesso!');
    }

    public function destroy(Modalidade $modalidade)
    {
        DB::beginTransaction();

        if (!$modalidade->update(['status' => 'inativo', 'user_alteracao_id' => auth()->user()->id])) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Erro ao deleta uma modalidade!');
        }
        DB::commit();
        return redirect()->route('modalidade.index')
            ->with('success', 'Modalidade deletada com sucesso!');
    }
}
