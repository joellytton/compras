@extends('layout.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Central de Atendimento</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Início</a></li>
                        <li class="breadcrumb-item active">Central de Atendimento</li>
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
                            <a class="btn btn-primary btn-md" href="{{route('centralAtendimento.create')}}"
                               role="button">
                                Nova Central de Atendimento
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Lista de Centrais de Atendimento</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th class="text-center">Central de Atendimento</th>
                                    <th class="text-center">Ação</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($centrais as $central)
                                    <tr>
                                        <td>{{$central->id}}</td>
                                        <td class="text-center">{{$central->nome}}</td>
                                        <td class="text-center">
                                            <a href="{{route('centralAtendimento.edit', $central->id)}}"
                                               class="btn btn-primary btn-sm mr-1">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{route('centralAtendimento.destroy', $central->id)}}"
                                                  method="POST" id="formLaravel{{$central->id}}"
                                                  style="display:inline;">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger btn-sm submit mr-1"
                                                        idform="{{$central-> id}}">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">Nenhuma modalidade encontrada</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                            <div class="card-footer clearfix">
                                {{ $centrais->links() }}
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
