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
                        <h2>Visualizando {{ $row->nome }}</h2> <p style="align-items: center;display: flex; border-radius: 10px;" class="m-0 pr-2 pl-2 bg-{{ ($row->condicao == 'Usado')? 'warning text-dark' : 'success' }}">{{ $row->condicao }}</p>
                    </div>

                    <div class="card-body viewproduto">
                        <p> <span> Cód. Barra:</span>{{ $row->codbarra }}
                            <span> Nome do Produto:</span>{{ $row->nome }}</p>
                        <p> <span> Fabricante:</span>{{ $row->fabricante->nome }}
                            <a href="{{ route('fabricantes.index',['search'=>$row->fabricante->nome]) }}" class="btn btn-light" title="Abrir fabricante"><i class="fa fa-industry"></i></a></p>
                        <p> <span> Descrição:</span>{{ $row->descricao }}</p>
                        <p> <span> Fornecedor:</span>{{ $row->fornecedor->nomefantasia ? $row->fornecedor->nomefantasia : $row->fornecedor->razaosocial }}
                            <a href="{{ route('fornecedores.index',['search'=>($row->fornecedor->nomefantasia ? $row->fornecedor->nomefantasia : $row->fornecedor->razaosocial)]) }}" class="btn btn-light" title="Abrir fornecedor"><i class="fa fa-industry"></i></a></p>
                        <p> <span> Estoque:</span><strong  class="text-{{($row->min_estoque >= $row->qtd) ? 'danger' : ''}}">{{ $row->qtd }}</strong>
                            <span> Estoque Minimo:</span><strong  class="text-{{($row->min_estoque >= $row->qtd) ? 'danger' : ''}}">{{ $row->min_estoque }}</strong>
                            <span> Valor Custo:</span>{{ number_format($row->valor_custo,2,',','.') }}
                            <span> Percentual de Lucro:</span>{{ $row->perc_lucro }}%
                            <span> Valor de Venda:</span>{{ number_format($row->valor_final,2,',','.') }}</p>

                        <p> <span> Status:</span>{{ $row->status ? 'Habilitado' : 'Desabilitadp' }}</p>
                        <p class="barra bg-{{($row->qtd > 0) ? 'success' : 'danger'}} text-white">{{($row->min_estoque >= $row->qtd) ? 'sem estoque' : 'em estoque'}}</p>
                        <p class="d-flex justify-content-center">
                            <a href="{{ route('produtos.edit',$row->id) }}" title="Editar" class="btn btn-primary w-50"><i class="fa fa-edit"> Editar</i></a>
                            <a href="{{ route('produtos.index') }}" title="Voltar" class="btn btn-danger w-50"><i class="fa fa-backspace"> Voltar</i></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

