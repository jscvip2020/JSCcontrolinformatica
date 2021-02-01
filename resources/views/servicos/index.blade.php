<?php
/**
 * Created by JS'Cordeiro Programas.
 * User: Sergio
 * Date: 01/02/2021
 * Time: 12:02
 */ ?>

@extends('layouts.appAdmin')

@section('title',' - Controle de Servicos')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header titulo-table">
                        <h2 class="col-md-6">Controle de Servicos</h2>
                    </div>

                    <div class="card-body">
                        @include('layouts._mensagems')

                        <div class="py-12">
                            <div class="container">
                                <div class="row">
                                    <table class="table col-md-8">
                                        <thead>
                                        <tr>
                                            <th class="text-left">Nº</th>
                                            <th class="text-left">Serviço</th>
                                            <th class="text-left">Valor</th>
                                            <th width="150px" class="text-center"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 1 ?>
                                        @foreach($servicos as $servico)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $servico->servico }}</td>
                                                <td>{{ number_format($servico->valor,2,',','.') }}</td>
                                                <td class="action">
                                                    @can('servico-edit')
                                                        <a class="btn btn-info btn-sm mr-1"
                                                           href="{{ route('servicos.edit', $servico->id) }}"
                                                           title="Editar"><i
                                                                    class="fa fa-edit"></i></a>
                                                    @endcan
                                                    @can('servico-delete')
                                                        <form id="form-delete{{$servico->id}}"
                                                              action="{{ route('servicos.destroy', $servico->id) }}"
                                                              method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button"
                                                                    onclick="event.preventDefault();
                                                                            if(confirm('Deseja excluir o Serviço \n {{ $servico->nome }}?')){
                                                                            document.getElementById('form-delete{{$servico->id}}').submit();
                                                                            }"
                                                                    class="btn btn-sm btn-danger"
                                                                    title="Remover {{ $servico->nome }}"><i
                                                                        class="fa fa-trash"></i></button>
                                                        </form>
                                                    @endcan
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>

                                    {{--############# Criar Serviços ##########--}}

                                    @yield('servico')

                                    {{ $servicos->onEachSide(1)->links() }}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/jquery.mask.min.js') }}"></script>
    <script>
        $(function ($) {
            $('.money').mask("#.##0,00", {reverse: true});
        })
    </script>
@endsection