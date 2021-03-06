@section('pageTitle', 'Clientes -')

@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('css/datatables.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/pesquisa.css') }}">
@endsection

@extends('layouts.escopo')

@section('escopo')

<div class="block-content">
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-offset-1 col-xs-10">
                <div class="row">

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-2">
                        <h2 class="text-center page-title">Clientes</h2>
                        <hr>
                    </div>

                    <div id="resultados" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-2 table-responsive">

                        <table id="tabelaClientes" class="table table-hover table-sm">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome Fantasia
                                        <i class="fa fa-sort float-right my-1" aria-hidden="true"></i>
                                    </th>
                                    <th>Razão Social
                                        <i class="fa fa-sort float-right my-1" aria-hidden="true"></i>
                                    </th>
                                    <th>CNPJ
                                        <i class="fa fa-sort float-right my-1" aria-hidden="true"></i>
                                    </th>
                                    <th>Segmento
                                        <i class="fa fa-sort float-right my-1" aria-hidden="true"></i>
                                    </th>
                                    <th class="text-center">Detalhes</th>
                                </tr>
                            </thead>

                            <tbody id="dadosClientes">
                                @foreach ($clientes as $c)
                                <tr>
                                    <td class="ordem"></td>
                                    <td>
                                        @if ($c->nome_fantasia != null)
                                            {{ $c->nome_fantasia }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        @if ($c->razao_social != null)
                                            {{ $c->razao_social }}
                                        @else
                                        -
                                        @endif
                                    </td>
                                    <td>
                                        @if ($c->cnpj != null)
                                        {{ $c->cnpj }}
                                        @else
                                        -
                                        @endif
                                    </td>
                                    <td>
                                        @if ($c->segmento_mercado != null)
                                            {{ $c->segmento_mercado }}
                                        @else
                                        -
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-bc btn-xs" data-toggle="modal" data-target="#{{'clienteInfo'.$c->id}}">
                                            <span class="fas fa-info"></span>
                                        </button>
                                    </td>
                                </tr>

                                <div id="{{'clienteInfo'.$c->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="clienteInfoLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4>@if($c->nome_fantasia != null){{ $c->nome_fantasia }}@else{{ $c->razao_social }}@endif</h4>
                                                <button class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Razão Social: {{ $c->razao_social }}</p>
                                                <p>CNPJ: {{ $c->cnpj }}</p>
                                                <p>Segmento: @if($c->segmento_mercado == null)N/A @else{{ $c->segmento_mercado }}@endif</p>
                                                {{-- <p>Sistema Contratado: {{ $c->software['nome_software'] }}</p>@if($c->software['nome_software'] != null)<a href="">gerar chave >>></a>@endif --}}
                                                <p>Email: {{ $c->email }}</p>
                                                <p>Telefone: {{ $c->telefone }}</p>
                                                <p>Registrado por: {{ $c->user['name'] }}</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-bc" onclick="window.location='/cliente/{{ $c->id }}/dados'">Editar Informações</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('js/datatables.min.js') }}"></script>
<script src="{{ asset('js/search.js') }}"></script>
@endsection
