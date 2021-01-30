@extends('layouts.appAdmin')
@section('title', ' - Registrando Produto')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Registrar Produto</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('produtos.store') }}">
                            @csrf

                            <div class="form-group row">
                                <?php $input = 'codbarra' ?>
                                <label for="{{ $input }}" class="col-md-12 col-form-label">Cod. de Barra</label>

                                <div class="col-md-12">
                                    <input id="{{ $input }}" type="text"
                                           class="form-control @error($input) is-invalid @enderror" name="{{ $input }}"
                                           value="{{ old($input) }}" autofocus>

                                    @error($input)
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <?php $input = 'condicao' ?>
                                <label for="{{ $input }}" class="col-md-12 col-form-label">Condição</label>

                                <div class="col-md-12">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="inlineCheckbox1"
                                               name="{{ $input }}" value="Novo" checked>
                                        <label class="form-check-label" for="inlineCheckbox1">Novo</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="inlineCheckbox2"
                                               name="{{ $input }}" value="Usado">
                                        <label class="form-check-label" for="inlineCheckbox2">Usado</label>
                                    </div>

                                    @error($input)
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <?php $input = 'nome' ?>
                                <label for="{{ $input }}" class="col-md-12 col-form-label">Nome</label>

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
                                <div class="col-md-2">
                                    <?php $input = 'qtd' ?>
                                    <label for="{{ $input }}" class="col-md-12 col-form-label">QTD</label>

                                    <div class="col-md-12">
                                        <input id="{{ $input }}" type="number"
                                               class="form-control @error($input) is-invalid @enderror"
                                               name="{{ $input }}"
                                               value="{{ old($input) ? old($input) : 0 }}">

                                        @error($input)
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <?php $input = 'min_estoque' ?>
                                    <label for="{{ $input }}" class="col-md-12 col-form-label">Min Est.</label>

                                    <div class="col-md-12">
                                        <input id="{{ $input }}" type="number"
                                               class="form-control @error($input) is-invalid @enderror"
                                               name="{{ $input }}"
                                               value="{{ old($input) ? old($input) : 0 }}">

                                        @error($input)
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-3">

                                    <?php $input = 'valor_custo' ?>
                                    <label for="{{ $input }}" class="col-md-12 col-form-label">Valor Custo</label>

                                    <div class="col-md-12">
                                        <input id="{{ $input }}" type="text"
                                               class="money form-control @error($input) is-invalid @enderror"
                                               name="{{ $input }}"
                                               value="{{ old($input) }}">

                                        @error($input)
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <?php $input = 'perc_lucro' ?>
                                    <label for="{{ $input }}" class="col-md-12 col-form-label">Perc.</label>

                                    <div class="col-md-12">
                                        <input id="{{ $input }}" type="text"
                                               class="percent form-control @error($input) is-invalid @enderror"
                                               name="{{ $input }}"
                                               value="{{ old($input) }}">

                                        @error($input)
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-md-3">
                                    <?php $input = 'valor_final' ?>
                                    <label for="{{ $input }}" class="col-md-12 col-form-label">Valor Final</label>

                                    <div class="col-md-12">
                                        <input id="{{ $input }}" type="text"
                                               class="money form-control @error($input) is-invalid @enderror"
                                               name="{{ $input }}"
                                               value="{{ old($input) }}">

                                        @error($input)
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>


                            <div class="form-group row">
                                <?php $input = 'fornecedor_id' ?>
                                <label for="{{ $input }}" class="col-md-12 col-form-label">Fornecedor</label>

                                <div class="col-md-12">
                                    <div class="input-group">
                                        <select id="{{ $input }}" data-toggle="tooltip"
                                                data-placement="top"
                                                title="Caso não encontre o FORNECEDOR adicione nos três pontinho..."
                                                class="form-control @error($input) is-invalid @enderror"
                                                name="{{ $input }}">
                                            <option value="">Selecione um Fornecedor</option>
                                            @foreach($fornecedores as $fornecedor)
                                                <option value="{{ $fornecedor->id }}" {{ old($input) ? ((old($input) == $fornecedor->id) ? 'selected' : '') : '' }}>{{ $fornecedor->nomefantasia ? $fornecedor->nomefantasia : $fornecedor->razaosocial }}</option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-append">
                                            <a href="{{ route('fornecedores.create') }}" class="btn btn-outline-secondary" type="button">...</a>
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
                                <?php $input = 'fabricante_id' ?>
                                <label for="{{ $input }}" class="col-md-12 col-form-label">Fabricante</label>

                                <div class="col-md-12">
                                    <div class="input-group">
                                        <select id="{{ $input }}" data-toggle="tooltip"
                                                data-placement="top"
                                                title="Caso não encontre o FABRICANTE adicione nos três pontinho..."
                                                class="form-control @error($input) is-invalid @enderror"
                                                name="{{ $input }}">
                                            <option value="">Selecione um Fabricante</option>
                                            @foreach($fabricantes as $fabricante)
                                                <option value="{{ $fabricante->id }}" {{ old($input) ? ((old($input) == $fabricante->id) ? 'selected' : '') : '' }}>{{ $fabricante->nome }}</option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-append">
                                            <a href="{{ route('fabricantes.create') }}" class="btn btn-outline-secondary" type="button">...</a>
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
                                <?php $input = 'descricao' ?>
                                <label for="{{ $input }}" class="col-md-12 col-form-label">Descrição</label>

                                <div class="col-md-12">
                                    <textarea id="{{ $input }}" type="text"
                                              class="form-control @error($input) is-invalid @enderror"
                                              name="{{ $input }}">{{ old($input) }}</textarea>

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
                                        Registrar Produto
                                    </button>
                                    <a href="{{ route('produtos.index') }}" class="btn btn-danger"> Cancelar</a>
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
    <script src="{{ asset('js/jquery.mask.min.js') }}"></script>
    <script>
        $(function ($) {
            $('.money').mask("#.##0,00", {reverse: true});
            $('.percent').mask('##0,00', {reverse: true});


            document.getElementById('perc_lucro').onkeyup = function () {

                if (this.value) {
                    this.value = this.value;
                } else {
                    this.value = 0.00
                }

                var valor = parseFloat(document.getElementById('valor_custo').value);
                valor = valor + valor * (parseFloat(this.value) / 100);
                if (valor) {
                    valor = valor;
                } else {
                    valor = 0.00;
                }
                document.getElementById('valor_final').value = valor.toLocaleString('pt-br', {minimumFractionDigits: 2});
            }
            document.getElementById('valor_custo').onkeyup = function () {
                var perc = parseFloat(document.getElementById('perc_lucro').value);
                if (perc) {
                    perc = perc;
                } else {
                    perc = 0;
                }
                var valor = parseFloat(this.value) + parseFloat(this.value) * (perc / 100);
                if (valor) {
                    valor = valor;
                } else {
                    valor = 0;
                }
                document.getElementById('valor_final').value = valor.toLocaleString('pt-br', {minimumFractionDigits: 2});
            }


        });

    </script>
@endsection