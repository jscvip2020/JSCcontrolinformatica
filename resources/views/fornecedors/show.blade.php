<?php
/**
 * Created by JS'Cordeiro Programas.
 * User: Sergio
 * Date: 13/01/2021
 * Time: 14:43
 */ ?>

@extends('layouts.appAdmin')

@section('title',' - Visualizando Criente')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-dark text-white titulo-table">
                        <h2 class="col-md-12">Visualizando
                            Cliente {{ ($data->nomefantasia!="")?$data->nomefantasia:$data->razaosocial }}</h2>
                    </div>

                    <div class="card-body">
                        <h5 class="card-title m-0"><label class="label col-md-2 text-right">Nome
                                fantasia:</label> {{ $data->nomefantasia }} </h5>
                        <h6 class="card-subtitle m-0"><label class="label col-md-2 text-right">Razão
                                social:</label> {{ $data->razaosocial }} </h6>
                        <p class="card-text m-0"><label
                                    class="label col-md-2 text-right">CNPJ:</label> {{ $data->cnpj }} </p>
                        <p class="card-text m-0"><label
                                    class="label col-md-2 text-right">Inscricao:</label> {{ $data->inscricao }} </p>
                        <p class="card-text m-0"><label
                                    class="label col-md-2 text-right">Endereco:</label> {{ $data->endereco }} </p>
                        <p class="card-text m-0"><label
                                    class="label col-md-2 text-right">bairro:</label> {{ $data->bairro }}</p>
                        <p class="card-text m-0"><label
                                    class="label col-md-2 text-right">CEP:</label> {{ $data->cep .' - '. $data->cidadeuf }}
                        </p>

                        <p class="card-text m-0"><label class="label col-md-2 text-right"><i
                                        class="fa fa-phone"></i></label> {{ $data->fixo }} </p>
                        <p class="card-text m-0"><label class="label col-md-2 text-right"><i
                                        class="fa fa-mobile"></i></label> {{ $data->celular }} </p>
                        <p class="card-text m-0"><label class="label col-md-2 text-right"><i
                                        class="fab fa-whatsapp"></i></label> {{ $data->whatsapp }} </p>
                        <p class="card-text m-0"><label class="label col-md-2 text-right"><i class="fa fa-envelope"></i></label> {{ $data->email }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

