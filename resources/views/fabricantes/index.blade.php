<?php
/**
 * Created by JS'Cordeiro Programas.
 * User: Sergio
 * Date: 09/01/2021
 * Time: 13:59
 */ ?>

@extends('layouts.appAdmin')

@section('title',' - Controle de Fabricantes')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header titulo-table">
                        <h2 class="col-md-6">Controle de Fabricantes</h2>
                        <a class="btn btn-primary" href="{{ route('fabricantes.create') }}">
                            <i class="fa fa-plus"> Nova Fabricante</i>
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
                                            <th class="text-left">Produtos</th>
                                            <th width="150px" class="text-center"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 1 ?>
                                        @foreach($fabricantes as $fabricante)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $fabricante->nome }}</td>
                                                <td>{{ count($fabricante->produtos) }}</td>
                                                <td class="action">
                                                    @can('fabricante-edit')
                                                        <a class="btn btn-info btn-sm mr-1"
                                                           href="{{ route('fabricantes.edit', $fabricante->id) }}"
                                                           title="Editar"><i
                                                                    class="fa fa-edit"></i></a>
                                                    @endcan
                                                    @can('fabricante-delete')
                                                        <form id="form-delete{{$fabricante->id}}"
                                                              action="{{ route('fabricantes.destroy', $fabricante->id) }}"
                                                              method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button"
                                                                    onclick="event.preventDefault();
                                                                            if(confirm('Deseja excluir a Fabricante \n {{ $fabricante->nome }}?')){
                                                                            document.getElementById('form-delete{{$fabricante->id}}').submit();
                                                                            }"
                                                                    class="btn btn-sm btn-danger"
                                                                    title="Remover {{ $fabricante->nome }}"><i
                                                                        class="fa fa-trash"></i></button>
                                                        </form>
                                                    @endcan
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                    {{ $fabricantes->onEachSide(1)->links() }}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection