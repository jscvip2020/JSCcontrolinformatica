<?php
/**
 * Created by JS'Cordeiro Programas.
 * User: Sergio
 * Date: 09/01/2021
 * Time: 13:59
 */ ?>

@extends('layouts.appAdmin')

@section('title',' - Controle de Fornecedores')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header titulo-table">
                        <h2 class="col-md-6">Controle de Fornecedores</h2>
                        <a class="btn btn-primary" href="{{ route('fornecedores.create') }}">
                            <i class="fa fa-plus"> Novo Cliente</i>
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
                                            <th class="text-left">Nomes</th>
                                            <th class="text-left">Documento</th>
                                            <th class="text-left">Fones</th>
                                            <th class="text-left">email</th>
                                            <th width="150px" class="text-center"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 1 ?>
                                        @foreach($fornecedors as $fornecedor)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>
                                                    {{ $fornecedor->nomefantasia }}<br>
                                                    {{ $fornecedor->razaosocial }}
                                                </td>
                                                <td>
                                                    CNPJ: {{ $fornecedor->cnpj }}<br>Insc.
                                                    Est.: {{ $fornecedor->inscricao }}
                                                </td>
                                                <td>Cel: {{ $fornecedor->celular }}<br>
                                                    Fixo: {{ $fornecedor->fixo }}<br>
                                                    Skype: {{ $fornecedor->skype }}<br>
                                                    Whatsapp: {{ $fornecedor->whatsapp }}</td>
                                                <td>{{ $fornecedor->email }}</td>
                                                <td class="action">
                                                    <a class="btn btn-success btn-sm mr-1"
                                                       href="{{ route('fornecedores.show', $fornecedor->id) }}"
                                                       title="visualizar"><i
                                                                class="fa fa-eye"></i></a>
                                                    @can('fornecedor-edit')
                                                        <a class="btn btn-info btn-sm mr-1"
                                                           href="{{ route('fornecedores.edit', $fornecedor->id) }}"
                                                           title="Editar"><i
                                                                    class="fa fa-edit"></i></a>
                                                    @endcan
                                                    @can('fornecedor-delete')
                                                        <form id="form-delete{{$fornecedor->id}}"
                                                              action="{{ route('fornecedores.destroy', $fornecedor->id) }}"
                                                              method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button"
                                                                    onclick="event.preventDefault();
                                                                            if(confirm('Deseja excluir esse fornecedore?')){
                                                                            document.getElementById('form-delete{{$fornecedor->id}}').submit();
                                                                            }"
                                                                    class="btn btn-sm btn-danger"
                                                                    title="Remover Fornecedor"><i
                                                                        class="fa fa-trash"></i></button>
                                                        </form>
                                                    @endcan
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                    {{ $fornecedors->onEachSide(3)->links() }}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection