@extends('layouts.appAdmin')
@section('title', ' - Alterando Fabricante')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Alterar Fabricante</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('fabricantes.update', $fabricante->id) }}">
                            @csrf
                            @method('PUT')
                            <?php $input = 'nome' ?>
                            <div class="form-group row">
                                <label for="{{ $input }}" class="col-md-12 col-form-label">Fabricante</label>

                                <div class="col-md-12">
                                    <input id="{{ $input }}" type="text"
                                           class="form-control @error($input) is-invalid @enderror" name="{{ $input }}"
                                           value="{{ old($input) ? old($input) : $fabricante->nome }}" required autofocus>

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
                                        Alterar Fabricante
                                    </button>
                                    <a href="{{ route('fabricantes.index') }}" class="btn btn-danger"> Cancelar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
