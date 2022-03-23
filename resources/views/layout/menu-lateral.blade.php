<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link">
        <img src="{{asset('img/auction2.png')}}" alt="Logo" class="brand-image img-circle">

        <span class="brand-text font-weight-normal">SisCompras</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('processo.index')}}" class="nav-link
                    {!! (Request::is('processo*') ? 'active' :"") !!}">
                        <i class="fas fa-solid fa-cart-arrow-down nav-icon"></i>
                        <p>Processos</p>
                    </a>
                </li>

                <li class="nav-header">ADMINISTRAÇÃO</li>
                <li class="nav-item">
                    <a href="{{route('areaAbrangencia.index')}}" class="nav-link
                    {!! (Request::is('areaAbrangencia*') ? 'active' :"") !!}">
                        <i class="fas fa-circle nav-icon"></i>
                        <p>Área de Abrangência</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('modalidade.index')}}" class="nav-link
                    {!! (Request::is('modalidade*') ? 'active' :"") !!}">
                        <i class="fas fa-circle nav-icon"></i>
                        <p>Modalidade</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('objeto.index')}}"
                       class="nav-link {!! (Request::is('objeto*') ? 'active' :"") !!}">
                        <i class="fas fa-circle nav-icon"></i>
                        <p>Objeto</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('tipoGasto.index')}}"
                       class="nav-link {!! (Request::is('tipoGasto*') ? 'active' :"") !!}">
                        <i class="fas fa-circle nav-icon"></i>
                        <p>Tipo de Gasto</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('unidadeContempladas.index')}}"
                       class="nav-link {!! (Request::is('unidadeContempladas*') ? 'active' :"") !!}">
                        <i class="fas fa-circle nav-icon"></i>
                        <p>Unidades Contempladas</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
