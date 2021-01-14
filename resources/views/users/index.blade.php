<?php
/**
 * Created by JS'Cordeiro Programas.
 * User: Sergio
 * Date: 09/01/2021
 * Time: 13:59
 */ ?>

@extends('layouts.appAdmin')

@section('title',' - Usuarios')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header titulo-table">
                        <h2 class="col-md-6">Controle de Usuário</h2>
                        <a class="btn btn-primary" href="{{ route('users.create') }}">
                            <i class="fa fa-plus"> Novo Usuário</i>
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
                                            <th class="text-left">Email</th>
                                            <th class="text-left">Regras</th>
                                            <th class="text-center"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 1 ?>
                                        @foreach($data as $user)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    @if($user->getRoleNames())
                                                        @foreach($user->getRoleNames() as $v)
                                                            <label class="badge badge-success">{{ $v }}</label>
                                                        @endforeach
                                                    @endif
                                                </td>
                                                <td class="action">
                                                    @can('user-edit')
                                                        <a class="btn btn-info btn-sm"
                                                           href="{{ route('users.edit', $user->id) }}" title="Editar"><i
                                                                    class="fa fa-edit"></i></a>
                                                    @endcan
                                                    @can('user-delete')
                                                        <form id="form-delete{{$user->id}}"
                                                              action="{{ route('users.destroy', $user->id) }}"
                                                              method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button"
                                                                    onclick="event.preventDefault();
                                                                            if(confirm('Deseja excluir {{ $user->name }} \n {{$user->nome}}?')){
                                                                            document.getElementById('form-delete{{$user->id}}').submit();
                                                                            }"
                                                                    class="btn btn-sm btn-danger"
                                                                    title="Remover {{ $user->name }}"><i
                                                                        class="fa fa-trash"></i></button>
                                                        </form>
                                                    @endcan
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                    {{ $data->onEachSide(3)->links() }}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection