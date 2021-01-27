@extends('layouts.appAdmin')
@section('title', ' - Registrando Equipamento')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Registrar Equipamento</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('equipamentos.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="nome" class="col-md-12 col-form-label">Marca do Equipamento</label>

                                <?php $input = 'marca_id' ?>
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <select id="{{ $input }}" type="text" data-toggle="tooltip"
                                                data-placement="top"
                                                title="Caso não encontre a MARCA adicione nos três pontinho..."
                                                class="form-control @error($input) is-invalid @enderror"
                                                name="{{ $input }}">
                                            <option value="">Escolha a marca</option>
                                            @foreach($marcas as $marca)
                                                <option value="{{ $marca->id }}">{{ $marca->nome }}</option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-append">
                                            <a href="{{ route('marcas.create') }}" class="btn btn-outline-secondary" type="button">...</a>
                                        </div>

                                    @error($input)
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nome" class="col-md-12 col-form-label">Nome do Equipamento</label>

                                <?php $input = 'nome' ?>
                                <div class="col-md-12">
                                    <input id="{{ $input }}" type="text"
                                           class="form-control @error($input) is-invalid @enderror" name="{{ $input }}"
                                           value="{{ old($input) }}" required>

                                    @error($input)
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nome" class="col-md-12 col-form-label">Modelo do Equipamento</label>

                                <?php $input = 'modelo' ?>
                                <div class="col-md-12">
                                    <input id="{{ $input }}" type="text"
                                           class="form-control @error($input) is-invalid @enderror" name="{{ $input }}"
                                           value="{{ old($input) }}">

                                    @error($input)
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nome" class="col-md-12 col-form-label">Descrição do Equipamento</label>

                                <?php $input = 'descricao' ?>
                                <div class="col-md-12">
                                    <textarea id="{{ $input }}" type="text"
                                           class="form-control @error($input) is-invalid @enderror" name="{{ $input }}">{{ old($input) }}</textarea>

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
                                        Registrar Equipamento
                                    </button>
                                    <a href="{{ route('equipamentos.index') }}" class="btn btn-danger"> Cancelar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
@endsection