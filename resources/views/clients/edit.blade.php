@extends('layouts.appAdmin')
@section('title', ' - Alterando Cliente')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Alterar Cliente</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('clientes.update', $data->id) }}">
                            @csrf
                            @method('PUT')

                            <?php $campo = 'pessoa'?>
                            <div class="form-group row">
                                <label for="{{ $campo }}" class="col-md-3 text-right col-form-label">Pessoa</label>

                                <div class="col-md-9">
                                    <input id="pfisica" type="text"
                                           class="form-control" name="{{ $campo }}"
                                           value="{{ old($campo) ? old($campo) : $data->$campo }}" readonly>
                                </div>
                            </div>
                            @if(old('pessoa')=='Juridica' OR $data->pessoa=='Juridica')
                                <?php $campo = 'razaosocial'?>
                                <div class="form-group row razaosocial">
                                    <label for="{{ $campo }}" class="col-md-3 text-right col-form-label">Razão
                                        social</label>

                                    <div class="col-md-9">
                                        <input type="text" id="{{$campo}}"
                                               class="form-control @error($campo) is-invalid @enderror"
                                               name="{{ $campo }}"
                                               value="{{ old($campo) ? old($campo) : $data->$campo }}">

                                        @error($campo)
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <?php $campo = 'nomefantasia'?>
                                <div class="form-group row nomefantasia">
                                    <label for="{{$campo}}" class="col-md-3 text-right col-form-label">Nome
                                        Fantasia</label>

                                    <div class="col-md-9">
                                        <input type="text" id="{{$campo}}"
                                               class="form-control @error($campo) is-invalid @enderror"
                                               name="{{ $campo }}"
                                               value="{{ old($campo) ? old($campo) : $data->$campo }}">

                                        @error($campo)
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <?php $campo = 'cnpj'?>
                                <div class="form-group row cnpj">
                                    <label for="{{ $campo }}"
                                           class="col-md-3 text-right col-form-label">CNPJ</label>

                                    <div class="col-md-9">
                                        <input type="text" id="{{$campo}}"
                                               class="cnpjinput form-control @error($campo) is-invalid @enderror"
                                               name="{{ $campo }}"
                                               value="{{ old($campo) ? old($campo) : $data->$campo }}">

                                        @error($campo)
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <?php $campo = 'inscricao'?>
                                <div class="form-group row inscricao">
                                    <label for="{{ $campo }}"
                                           class="col-md-3 text-right col-form-label">Insc. Est.</label>

                                    <div class="col-md-9">
                                        <input type="text" id="{{$campo}}"
                                               class="form-control @error($campo) is-invalid @enderror"
                                               name="{{ $campo }}"
                                               value="{{ old($campo) ? old($campo) : $data->$campo }}">

                                        @error($campo)
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                            @else
                                <?php $campo = 'nome'?>
                                <div class="form-group row nome">
                                    <label for="{{ $campo }}"
                                           class="col-md-3 text-right col-form-label">{{ __('Name') }}</label>

                                    <div class="col-md-9">
                                        <input type="text" id="{{$campo}}"
                                               class="form-control @error($campo) is-invalid @enderror"
                                               name="{{ $campo }}"
                                               value="{{ old($campo) ? old($campo) : $data->$campo }}">

                                        @error($campo)
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <?php $campo = 'cpf'?>
                                <div class="form-group row cpf">
                                    <label for="{{ $campo }}"
                                           class="col-md-3 text-right col-form-label">CPF</label>

                                    <div class="col-md-9">
                                        <input type="text" id="{{$campo}}"
                                               class="cpfinput form-control @error($campo) is-invalid @enderror"
                                               name="{{ $campo }}"
                                               value="{{ old($campo) ? old($campo) : $data->$campo }}">

                                        @error($campo)
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                            @endif

                            <fieldset style="border: 1px solid;" class="p-1">
                                <legend class="fa-1x font-weight-bold">Endereço</legend>

                                <?php $campo = 'endereco'?>
                                <div class="form-group row">
                                    <label for="{{ $campo }}"
                                           class="col-md-3 text-right col-form-label">Endereço</label>

                                    <div class="col-md-9">
                                        <input type="text"
                                               class="form-control @error($campo) is-invalid @enderror"
                                               name="{{ $campo }}" required
                                               value="{{ old($campo) ? old($campo) : $data->$campo }}">

                                        @error($campo)
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <?php $campo = 'bairro'?>
                                <div class="form-group row">
                                    <label for="{{ $campo }}" class="col-md-3 text-right col-form-label">Bairro</label>

                                    <div class="col-md-9">
                                        <input type="text"
                                               class="form-control @error($campo) is-invalid @enderror"
                                               name="{{ $campo }}" required
                                               value="{{ old($campo) ? old($campo) : $data->$campo }}">

                                        @error($campo)
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>


                                <?php $campo = 'cep'?>
                                <div class="form-group row">
                                    <label for="{{ $campo }}" class="col-md-3 text-right col-form-label">CEP</label>

                                    <div class="col-md-9">
                                        <input type="text"
                                               class="cep form-control @error($campo) is-invalid @enderror"
                                               name="{{ $campo }}" required
                                               value="{{ old($campo) ? old($campo) : $data->$campo }}">

                                        @error($campo)
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <?php $campo = 'cidadeuf'?>
                                <div class="form-group row">
                                    <label for="{{ $campo }}"
                                           class="col-md-3 text-right col-form-label">Cidade-UF</label>

                                    <div class="col-md-9">
                                        <input type="text"
                                               class="form-control @error($campo) is-invalid @enderror"
                                               name="{{ $campo }}" required
                                               value="{{ old($campo) ? old($campo) : $data->$campo }}">

                                        @error($campo)
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset style="border: 1px solid;" class="p-1 mb-2">
                                <legend class="fa-1x font-weight-bold">Contatos</legend>
                                <?php $campo = 'fixo'?>
                                <div class="form-group row">
                                    <label for="{{ $campo }}" class="col-md-3 text-right col-form-label">Fixo</label>

                                    <div class="col-md-9">
                                        <input type="text" id="phone"
                                               class="phone form-control @error($campo) is-invalid @enderror"
                                               name="{{ $campo }}"
                                               value="{{ old($campo) ? old($campo) : $data->$campo }}">

                                        @error($campo)
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <?php $campo = 'celular'?>
                                <div class="form-group row">
                                    <label for="{{ $campo }}" class="col-md-3 text-right col-form-label">Celular</label>

                                    <div class="col-md-9">
                                        <input type="text"
                                               class="phone form-control @error($campo) is-invalid @enderror"
                                               name="{{ $campo }}"
                                               value="{{ old($campo) ? old($campo) : $data->$campo }}">

                                        @error($campo)
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <?php $campo = 'whatsapp'?>
                                <div class="form-group row">
                                    <label for="{{ $campo }}"
                                           class="col-md-3 text-right col-form-label">Whatsapp</label>

                                    <div class="col-md-9">
                                        <input type="text"
                                               class="phone form-control @error($campo) is-invalid @enderror"
                                               name="{{ $campo }}"
                                               value="{{ old($campo) ? old($campo) : $data->$campo }}">

                                        @error($campo)
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <?php $campo = 'email'?>
                                <div class="form-group row">
                                    <label for="{{ $campo }}"
                                           class="col-md-3 text-right col-form-label">Email</label>

                                    <div class="col-md-9">
                                        <input type="email"
                                               class="form-control @error($campo) is-invalid @enderror"
                                               name="{{ $campo }}"
                                               value="{{ old($campo) ? old($campo) : $data->$campo }}">

                                        @error($campo)
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                            </fieldset>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Alterar Regra
                                    </button>
                                    <a href="{{ route('clientes.index') }}" class="btn btn-danger"> Cancelar</a>
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
            var SPMaskBehavior = function (val) {
                    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
                },
                spOptions = {
                    onKeyPress: function (val, e, field, options) {
                        field.mask(SPMaskBehavior.apply({}, arguments), options);
                    }
                };

            $('.phone').mask(SPMaskBehavior, spOptions);
            $('.cep').mask('00000-000');
            $('.cpfinput').mask('000.000.000-00', {reverse: false});
            $('.cnpjinput').mask('00.000.000/0000-00', {reverse: false});

        });
    </script>
@endsection