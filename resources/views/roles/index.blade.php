<?php
/**
 * Created by JS'Cordeiro Programas.
 * User: Sergio
 * Date: 09/01/2021
 * Time: 13:59
 */ ?>

@extends('layouts.appAdmin')

@section('title',' - Controle de Regras')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header titulo-table">
                        <h2 class="col-md-6">Controle de Regras</h2>
                        <a class="btn btn-primary" href="{{ route('roles.create') }}">
                            <i class="fa fa-plus"> Nova Regra</i>
                        </a>
                    </div>

                    <div class="card-body">
                        @include('layouts._mensagems')

                        <div class="py-12">
                            <div class="container">
                                <div class="row">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th class="text-left">Nº</th>
                                            <th class="text-left">Nome</th>
                                            <th class="text-left">Permissões</th>
                                            <th width="150px" class="text-center"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 1 ?>
                                        @foreach($roles as $role)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $role->name }}</td>
                                                <td>
                                                    @if($role->getPermissionNames())
                                                        <label class="badge badge-success">{{ count($role->getPermissionNames()) }}</label>
                                                    @endif
                                                </td>
                                                <td class="action">
                                                    <a class="btn btn-success btn-sm mr-1"
                                                       href="{{ route('roles.show', $role->id) }}" title="visualizar"><i
                                                                class="fa fa-eye"></i></a>
                                                    @can('role-edit')
                                                        <a class="btn btn-info btn-sm mr-1"
                                                           href="{{ route('roles.edit', $role->id) }}" title="Editar"><i
                                                                    class="fa fa-edit"></i></a>
                                                    @endcan
                                                    @can('role-delete')
                                                        <form id="form-delete{{$role->id}}"
                                                              action="{{ route('roles.destroy', $role->id) }}"
                                                              method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button"
                                                                    onclick="event.preventDefault();
                                                                            if(confirm('Deseja excluir {{ $role->name }} \n {{$role->nome}}?')){
                                                                            document.getElementById('form-delete{{$role->id}}').submit();
                                                                            }"
                                                                    class="btn btn-sm btn-danger"
                                                                    title="Remover {{ $role->name }}"><i
                                                                        class="fa fa-trash"></i></button>
                                                        </form>
                                                    @endcan
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                    {{ $roles->onEachSide(3)->links() }}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection