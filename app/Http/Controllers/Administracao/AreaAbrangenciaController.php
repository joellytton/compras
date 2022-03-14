<?php

namespace App\Http\Controllers\Administracao;

use App\Http\Controllers\Controller;
use App\Models\Administracao\AreaAbrangencia;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class AreaAbrangenciaController extends Controller
{
    public function index(Request $request): View
    {
        $perPage = 10;
        $keyword = empty($request->search) ? '' : $request->search;

        $areasAbrangencia = AreaAbrangencia::buscar($perPage, $keyword);
        return view('administracao.area_abrangencia.index', compact('areasAbrangencia'));
    }

    public function create(): View
    {
        return view('administracao.area_abrangencia.create');
    }

    public function store(Request $request): Response
    {
        $areaAbrangencia = new AreaAbrangencia();
        $areaAbrangencia->create($request->all());

        return redirect()->route('administracao.area-abrangencia.index')
            ->with('success', 'Área de abrangência cadastrada com sucesso!');
    }


    public function edit(AreaAbrangencia $areaAbrangencia): View
    {
        return view('administracao.area_abrangencia.edit', compact('areaAbrangencia'));
    }

    public function update(Request $request, AreaAbrangencia $areaAbrangencia): Response
    {
        $areaAbrangencia->update($request->all());

        return redirect()->route('administracao.area-abrangencia.index')
            ->with('success', 'Área de abrangência atualizada com sucesso!');
    }

    public function destroy(AreaAbrangencia $areaAbrangencia): Response
    {
        $areaAbrangencia->delete();
        $areaAbrangencia->update(['status' => 'inativo']);

        return redirect()->route('administracao.area-abrangencia.index')
            ->with('success', 'Área de abrangência excluída com sucesso!');
    }
}
