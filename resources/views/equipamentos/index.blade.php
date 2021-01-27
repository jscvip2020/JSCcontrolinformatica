<?php
/**
 * Created by JS'Cordeiro Programas.
 * User: Sergio
 * Date: 09/01/2021
 * Time: 13:59
 */ ?>

@extends('layouts.appAdmin')

@section('title',' - Controle de Equipamentos')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header titulo-table">
                        <h2 class="col-md-6">Controle de Equipamentos</h2>
                        <a class="btn btn-primary" href="{{ route('equipamentos.create') }}">
                            <i class="fa fa-plus"> Novo Equipamento</i>
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
                                            <th class="text-left">Marca</th>
                                            <th class="text-left">Nome</th>
                                            <th class="text-left">Modelo</th>
                                            <th class="text-left">Descrição</th>
                                            <th width="150px" class="text-center"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 1 ?>
                                        @foreach($rows as $equipamento)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $equipamento->marca->nome }}</td>
                                                <td>{{ $equipamento->nome }}</td>
                                                <td>{{ $equipamento->modelo }}</td>
                                                <td>{{ $equipamento->descricao }}</td>
                                                <td class="action">
                                                    @can('equipamento-edit')
                                                        <a class="btn btn-info btn-sm mr-1"
                                                           href="{{ route('equipamentos.edit', $equipamento->id) }}"
                                                           title="Editar"><i
                                                                    class="fa fa-edit"></i></a>
                                                    @endcan
                                                    @can('equipamento-delete')
                                                        <form id="form-delete{{$equipamento->id}}"
                                                              action="{{ route('equipamentos.destroy', $equipamento->id) }}"
                                                              method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button"
                                                                    onclick="event.preventDefault();
                                                                            if(confirm('Deseja excluir o Equipamento \n {{ $equipamento->nome }}?')){
                                                                            document.getElementById('form-delete{{$equipamento->id}}').submit();
                                                                            }"
                                                                    class="btn btn-sm btn-danger"
                                                                    title="Remover {{ $equipamento->nome }}"><i
                                                                        class="fa fa-trash"></i></button>
                                                        </form>
                                                    @endcan
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                    {{ $rows->onEachSide(3)->links() }}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection