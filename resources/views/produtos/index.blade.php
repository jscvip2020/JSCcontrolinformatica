<?php
/**
 * Created by JS'Cordeiro Programas.
 * User: Sergio
 * Date: 09/01/2021
 * Time: 13:59
 */ ?>

@extends('layouts.appAdmin')

@section('title',' - Controle de Produtos')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header titulo-table">
                        <h2 class="col-md-6">Controle de Produtos</h2>
                        <a class="btn btn-primary" href="{{ route('produtos.create') }}">
                            <i class="fa fa-plus"> Novo Produto</i>
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
                                            <th class="text-left">Condição</th>
                                            <th class="text-left">QTD</th>
                                            <th class="text-left">Nome</th>
                                            <th class="text-left">Custo</th>
                                            <th class="text-left">%</th>
                                            <th class="text-left">Valor</th>
                                            <th class="text-left">Ativo?</th>
                                            <th width="150px" class="text-center"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 1 ?>
                                        @foreach($produtos as $produto)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $produto->condicao }}</td>
                                                <td>{{ $produto->qtd }}</td>
                                                <td>{{ $produto->nome }}</td>
                                                <td>{{ number_format($produto->valor_custo,2,',','.') }}</td>
                                                <td>{{ $produto->perc_lucro }}</td>
                                                <td>{{ number_format($produto->valor_final,2,',','.') }}</td>
                                                <td>
                                                    @if($produto->status)
                                                        <a href="{{ route('produtos.status',[$produto->id,$produto->status]) }}" class="text-success"><i class="fa fa-check-circle fa-2x"></i></a>
                                                    @else
                                                        <a href="{{ route('produtos.status',[$produto->id,$produto->status]) }}" class="text-danger"><i class="fa fa-times-circle fa-2x"></i></a>
                                                    @endif
                                                </td>
                                                <td class="action">
                                                    <a class="btn btn-success btn-sm mr-1"
                                                       href="{{ route('produtos.show', $produto->id) }}"
                                                       title="visualizar"><i
                                                                class="fa fa-eye"></i></a>
                                                    @can('produto-edit')
                                                        <a class="btn btn-info btn-sm mr-1"
                                                           href="{{ route('produtos.edit', $produto->id) }}"
                                                           title="Editar"><i
                                                                    class="fa fa-edit"></i></a>
                                                    @endcan
                                                    @can('produto-delete')
                                                        <form id="form-delete{{$produto->id}}"
                                                              action="{{ route('produtos.destroy', $produto->id) }}"
                                                              method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button"
                                                                    onclick="event.preventDefault();
                                                                            if(confirm('Deseja excluir a Produto \n {{ $produto->nome }}?')){
                                                                            document.getElementById('form-delete{{$produto->id}}').submit();
                                                                            }"
                                                                    class="btn btn-sm btn-danger"
                                                                    title="Remover {{ $produto->nome }}"><i
                                                                        class="fa fa-trash"></i></button>
                                                        </form>
                                                    @endcan
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                    {{ $produtos->onEachSide(1)->links() }}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection