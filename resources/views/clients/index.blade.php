<?php
/**
 * Created by JS'Cordeiro Programas.
 * User: Sergio
 * Date: 09/01/2021
 * Time: 13:59
 */ ?>

@extends('layouts.appAdmin')

@section('title',' - Controle de Clientes')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header titulo-table">
                        <h2 class="col-md-6">Controle de Clientes</h2>
                        <a class="btn btn-primary" href="{{ route('clientes.create') }}">
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
                                            <th class="text-left">Nome</th>
                                            <th class="text-left">Documento</th>
                                            <th class="text-left">Fones</th>
                                            <th class="text-left">email</th>
                                            <th width="150px" class="text-center"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 1 ?>
                                        @foreach($clients as $client)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>
                                                    @if($client->pessoa == 'Juridica')
                                                        {{ $client->nomefantasia }}<br>
                                                        {{ $client->razaosocial }}
                                                    @elseif($client->pessoa == 'Fisica')
                                                        {{ $client->nome }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($client->pessoa == 'Juridica')
                                                        CNPJ: {{ $client->cnpj }}<br>Insc.
                                                        Est.: {{ $client->inscricao }}
                                                    @elseif($client->pessoa == 'Fisica')
                                                        CPF: {{ $client->cpf }}
                                                    @endif
                                                </td>
                                                <td>Cel: {{ $client->celular }}<br>Fixo: {{ $client->fixo }}<br>
                                                    Whatsapp: {{ $client->whatsapp }}</td>
                                                <td>{{ $client->email }}</td>
                                                <td class="action">
                                                    <a class="btn btn-success btn-sm mr-1"
                                                       href="{{ route('clientes.show', $client->id) }}"
                                                       title="visualizar"><i
                                                                class="fa fa-eye"></i></a>
                                                    @can('client-edit')
                                                        <a class="btn btn-info btn-sm mr-1"
                                                           href="{{ route('clientes.edit', $client->id) }}"
                                                           title="Editar"><i
                                                                    class="fa fa-edit"></i></a>
                                                    @endcan
                                                    @can('client-delete')
                                                        <form id="form-delete{{$client->id}}"
                                                              action="{{ route('clientes.destroy', $client->id) }}"
                                                              method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button"
                                                                    onclick="event.preventDefault();
                                                                            if(confirm('Deseja excluir esse cliente \n {{$client->nome}}?')){
                                                                            document.getElementById('form-delete{{$client->id}}').submit();
                                                                            }"
                                                                    class="btn btn-sm btn-danger"
                                                                    title="Remover {{ $client->nome }}"><i
                                                                        class="fa fa-trash"></i></button>
                                                        </form>
                                                    @endcan
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                    {{ $clients->onEachSide(3)->links() }}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection