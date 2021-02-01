<?php
/**
 * Created by JS'Cordeiro Programas.
 * User: Sergio
 * Date: 01/02/2021
 * Time: 12:36
 */ ?>
@extends('servicos.index')
@section('servico')
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">Editando Serviço</div>

            <div class="card-body">
                <form method="POST" action="{{ route('servicos.update',$row->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="form-group row">
                        <?php $input = 'servico' ?>
                        <label for="{{ $input }}" class="col-md-12 col-form-label">Serviço</label>

                        <div class="col-md-12">
                            <input id="{{ $input }}" type="text"
                                   class="form-control @error($input) is-invalid @enderror"
                                   name="{{ $input }}"
                                   value="{{ $row ? $row->$input : old($input) }}" autofocus>

                            @error($input)
                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <?php $input = 'valor' ?>
                        <label for="{{ $input }}" class="col-md-12 col-form-label">Serviço</label>

                        <div class="col-md-12">
                            <input id="{{ $input }}" type="text"
                                   class="form-control money @error($input) is-invalid @enderror"
                                   name="{{ $input }}"
                                   value="{{ $row ? $row->$input : old($input) }}">

                            @error($input)
                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <button type="submit" class="col-md-12 btn btn-primary">
                            Adicionar Serviço
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

