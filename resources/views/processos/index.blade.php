@extends('layout.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Processo</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Início</a></li>
                        <li class="breadcrumb-item active">Processo</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12 text-right mb-4">
                    <div class="card">
                        <div class="card-body">
                            <a class="btn btn-primary btn-md" href="{{route('processo.create')}}" role="button">
                                Novo Processo
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Lista de processos</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th class="text-center">Sei</th>
                                    <th class="text-center">Edital</th>
                                    <th class="text-center">Ano</th>
                                    <th class="text-center">Área de Abrangência</th>
                                    <th class="text-center">Modalidade</th>
                                    <th class="text-center">Técnico Responsável</th>
                                    <th class="text-center">Tipo de Gasto</th>
                                    <th class="text-center">Centrais</th>
                                    <th class="text-center">Situação</th>
                                    <th class="text-center">Ação</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($processos as $processo)
                                    <tr>
                                        <td>{{$processo->id}}</td>
                                        <td class="text-center">{{$processo->sei}}</td>
                                        <td class="text-center">{{$processo->sei}}</td>
                                        <td class="text-center">{{$processo->sei}}</td>
                                        <td class="text-center">{{$processo->sei}}</td>
                                        <td class="text-center">{{$processo->sei}}</td>
                                        <td class="text-center">{{$processo->sei}}</td>
                                        <td class="text-center">{{$processo->sei}}</td>
                                        <td class="text-center">{{$processo->sei}}</td>
                                        <td class="text-center">{{$processo->sei}}</td>
                                        <td class="text-center">
                                            <a href="{{route('compra.edit', $processo->id)}}"
                                               class="btn btn-primary btn-sm mr-1">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{route('compra.destroy', $processo->id)}}"
                                                  method="POST" id="formLaravel{{$processo->id}}"
                                                  style="display:inline;">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger btn-sm mr-1">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="11" class="text-center">Nenhum processo encontrado</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                            <div class="card-footer clearfix">
                                {{ $processos->links() }}
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
