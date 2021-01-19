@extends('layouts.appAdmin')
@section('title', ' - Alterando Marca')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Alterar Marca</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('marcas.update', $marca->id) }}">
                            @csrf
                            @method('PUT')
                            <?php $input = 'nome' ?>
                            <div class="form-group row">
                                <label for="{{ $input }}" class="col-md-12 col-form-label">Marca</label>

                                <div class="col-md-12">
                                    <input id="{{ $input }}" type="text"
                                           class="form-control @error($input) is-invalid @enderror" name="{{ $input }}"
                                           value="{{ old($input) ? old($input) : $marca->nome }}" required autofocus>

                                    @error($input)
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Alterar Marca
                                    </button>
                                    <a href="{{ route('marcas.index') }}" class="btn btn-danger"> Cancelar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
