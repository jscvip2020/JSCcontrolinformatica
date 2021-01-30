<?php
/**
 * Created by JS'Cordeiro Programas.
 * User: Sergio
 * Date: 09/01/2021
 * Time: 12:30
 */ ?>

<nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
        <!-- sidebar-brand  -->
        <div class="sidebar-item sidebar-brand">
            <a href="{{ route('home') }}">{{ config('app.name', 'Controle de Estoque 1.0') }}</a>
        </div>
        <!-- sidebar-header  -->
        <div class="sidebar-item sidebar-header d-flex flex-nowrap">
            <div class="user-pic">
                <img class="img-responsive img-rounded" src="{{asset('img/user.jpg')}}" alt="User picture">
            </div>
            <div class="user-info">
                        <span class="user-name">
                            {{ Auth::user()->name }}
                        </span>
                <span class="user-role">
                @if(!empty(Auth::user()->getRoleNames()))
                        @foreach(Auth::user()->getRoleNames() as $v)
                            {{ $v }}
                        @endforeach
                    @endif
                </span>
                <span class="user-status">
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                        <i class="fa fa-door-open"></i> {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </span>
            </div>
        </div>
        <!-- sidebar-search  -->
        <?php
        $index = explode(".", request()->route()->getName());
        ?>
        @if($index[0]!="")
            @if($index[1]=='index')
                <div class="sidebar-item sidebar-search">
                    <div>
                        <form action="{{ route(request()->route()->getName()) }}" method="get">
                            <div class="input-group">

                                <input type="text" class="form-control search-menu" name="search"
                                       placeholder="buscar {{ $index[0] }}...">
                                <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
        @endif
    @endif
    <!-- sidebar-menu  -->
        <div class=" sidebar-item sidebar-menu">
            <ul>
                <li class="header-menu">
                    <span>General</span>
                </li>
                <li class="sidebar-dropdown {{ (
                request()->route()->getName()=='users.index' OR
                request()->route()->getName()=='users.create' OR
                request()->route()->getName()=='users.edit' OR
                request()->route()->getName()=='roles.index' OR
                request()->route()->getName()=='roles.create' OR
                request()->route()->getName()=='roles.edit' OR
                request()->route()->getName()=='roles.show' OR
                request()->route()->getName()=='permissions.index' OR
                request()->route()->getName()=='permissions.create' OR
                request()->route()->getName()=='permissions.edit' OR
                request()->route()->getName()=='permissions.show')? 'active' :'' }}">
                    <a href="#">
                        <i class="fa fa-key"></i>
                        <span class="menu-text">Controle de acesso</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            @can('user-list')
                                <li class="{{ (request()->route()->getName()=='users.index' OR request()->route()->getName()=='users.create' OR request()->route()->getName()=='users.edit')? 'active' :'' }}">
                                    <a href="{{ route('users.index') }}">
                                        <i class="fa fa-user"></i>
                                        <span class="menu-text">Usuários</span>
                                        <span class="badge badge-pill badge-primary">{{ $users }}</span>
                                    </a>
                                </li>
                            @endcan
                            @can('role-list')
                                <li class="{{ (request()->route()->getName()=='roles.index' OR request()->route()->getName()=='roles.create' OR request()->route()->getName()=='roles.edit' OR request()->route()->getName()=='roles.show')? 'active' :'' }}">
                                    <a href="{{ route('roles.index') }}">
                                        <i class="fa fa-book"></i>
                                        <span class="menu-text">Regras</span>
                                        <span class="badge badge-pill badge-primary">{{ $rolesAll }}</span>
                                    </a>
                                </li>
                            @endcan
                            @can('permission-list')
                                <li class="{{ (request()->route()->getName()=='permissions.index' OR request()->route()->getName()=='permissions.create' OR request()->route()->getName()=='permissions.edit' OR request()->route()->getName()=='permissions.show')? 'active' :'' }}">
                                    <a href="{{ route('permissions.index') }}">
                                        <i class="fa fa-book"></i>
                                        <span class="menu-text">Permissões</span>
                                        <span class="badge badge-pill badge-primary">{{ $permissionsAll }}</span>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </div>
                </li>
                @can('client-list')
                    <li class="{{ (request()->route()->getName()=='clientes.index' OR request()->route()->getName()=='clientes.create' OR request()->route()->getName()=='clientes.edit' OR request()->route()->getName()=='clientes.show')? 'active' :'' }}">
                        <a href="{{ route('clientes.index') }}">
                            <i class="fa fa-users"></i>
                            <span class="menu-text">Clientes</span>
                            <span class="badge badge-pill badge-primary">{{ $clientesAll }}</span>
                        </a>
                    </li>
                @endcan
                @can('fornecedor-list')
                    <li class="{{ (request()->route()->getName()=='fornecedores.index' OR request()->route()->getName()=='fornecedores.create' OR request()->route()->getName()=='fornecedores.edit' OR request()->route()->getName()=='fornecedores.show')? 'active' :'' }}">
                        <a href="{{ route('fornecedores.index') }}">
                            <i class="fa fa-users"></i>
                            <span class="menu-text">Fornecedores</span>
                            <span class="badge badge-pill badge-primary">{{ $fornecedoresAll }}</span>
                        </a>
                    </li>
                @endcan
                @can('marca-list')
                    <li class="{{ (request()->route()->getName()=='marcas.index' OR request()->route()->getName()=='marcas.create' OR request()->route()->getName()=='marcas.edit' OR request()->route()->getName()=='marcas.show')? 'active' :'' }}">
                        <a href="{{ route('marcas.index') }}">
                            <i class="fa fa-copyright"></i>
                            <span class="menu-text">Marcas</span>
                            <span class="badge badge-pill badge-primary">{{ $marcasAll }}</span>
                        </a>
                    </li>
                @endcan
                @can('equipamento-list')
                    <li class="{{ (request()->route()->getName()=='equipamentos.index' OR request()->route()->getName()=='equipamentos.create' OR request()->route()->getName()=='equipamentos.edit' OR request()->route()->getName()=='equipamentos.show')? 'active' :'' }}">
                        <a href="{{ route('equipamentos.index') }}">
                            <i class="fa fa-tablet"></i>
                            <span class="menu-text">Equipamentos</span>
                            <span class="badge badge-pill badge-primary">{{ $equipamentosAll }}</span>
                        </a>
                    </li>
                @endcan
                @can('fabricante-list')
                    <li class="{{ (request()->route()->getName()=='fabricantes.index' OR request()->route()->getName()=='fabricantes.create' OR request()->route()->getName()=='fabricantes.edit' OR request()->route()->getName()=='fabricantes.show')? 'active' :'' }}">
                        <a href="{{ route('fabricantes.index') }}">
                            <i class="fa fa-industry"></i>
                            <span class="menu-text">Fabricantes</span>
                            <span class="badge badge-pill badge-primary">{{ $fabricantesAll }}</span>
                        </a>
                    </li>
                @endcan
                @can('produto-list')
                    <li class="{{ (request()->route()->getName()=='produtos.index' OR request()->route()->getName()=='produtos.create' OR request()->route()->getName()=='produtos.edit' OR request()->route()->getName()=='produtos.show')? 'active' :'' }}">
                        <a href="{{ route('produtos.index') }}">
                            <i class="fab fa-product-hunt"></i>
                            <span class="menu-text">Produtos</span>
                            <span class="badge badge-pill badge-primary">{{ $produtosAll }}</span>
                        </a>
                    </li>
                @endcan
            </ul>
        </div>
        <!-- sidebar-menu  -->
    </div>
</nav>