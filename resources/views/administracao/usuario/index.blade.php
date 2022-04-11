@extends('layout.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Unidades Contempladas</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Início</a></li>
                        <li class="breadcrumb-item active">Usuários</li>
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
                            <a class="btn btn-primary btn-md" href="{{route('usuario.create')}}" role="button">
                                Nova Usuário
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Lista de usuários</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th class="text-center">Nome</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Perfil</th>
                                    <th class="text-center">Ação</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($usuarios as $usuario)
                                    <tr>
                                        <td>{{$usuario->id}}</td>
                                        <td class="text-center">{{$usuario->name}}</td>
                                        <td class="text-center">{{$usuario->email}}</td>
                                        <td class="text-center">{{$usuario->perfil->nome}}</td>
                                        <td class="text-center">
                                            <a href="{{route('usuario.edit', $usuario->id)}}"
                                               class="btn btn-primary btn-sm mr-1">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{route('redefinirSenhaPadrao', $usuario->id)}}"
                                                  method="POST" id="formSenha{{$usuario->id}}"
                                                  style="display:inline;">
                                                @csrf
                                                <button class="btn btn-warning btn-sm senha mr-1"
                                                        idSenha="{{$usuario->id}}">
                                                    <i class="fas fa-key"></i>
                                                </button>
                                            </form>
                                            <form action="{{route('usuario.destroy', $usuario->id)}}"
                                                  method="POST" id="formLaravel{{$usuario->id}}"
                                                  style="display:inline;">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger btn-sm submit mr-1"
                                                        idform="{{$usuario->id}}">
                                                    <i class=" fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Nenhuma usuário encontrado</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                            <div class="card-footer clearfix">
                                {{ $usuarios->links() }}
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
    <script>
        $(window).on("load", function () {
            $("body").on('click', '.senha', function (e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Você tem certeza ?',
                    text: "Você não poderá reverter isso!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: "Sim, Redefinir!",
                    cancelButtonText: "Não, cancele!",
                }).then((result) => {
                    if (result.isConfirmed) {
                        var $this = $(this);
                        document.getElementById("formSenha" + $this.attr("idSenha")).submit();
                    }
                })
            });
        });
    </script>
@endpush
