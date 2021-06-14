@extends('admin.layout.app')

@section('content')

<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Clientes</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="{{ route('dashboard') }}" title="dashboard">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="{{ route('clients.index') }}">Clientes cadastrados</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Editar cliente ({{ $client->name }})</a>
                </li>
            </ul>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Preencha os dados abaixo</div>
                    </div>
                    <form action="{{ route('clients.update', $client->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Nome</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Nome completo do cliente" value="{{ $client->name ?? old('name') }}">
                                </div>
    
                                <div class="form-check">
                                    <label>Pessoa</label><br>
                                    <label class="form-radio-label">
                                        <input class="form-radio-input" type="radio" name="type" value="PF" @if($client->type == 'PF') checked="" @endif>
                                        <span class="form-radio-sign">Fisica</span>
                                    </label>
                                    <label class="form-radio-label ml-3">
                                        <input class="form-radio-input" type="radio" name="type" value="PJ" @if($client->type == 'PJ') checked="" @endif>
                                        <span class="form-radio-sign">Juridica</span>
                                    </label>
                                </div>
    
                                <div class="form-group">
                                    <label for="document">Documento</label>
                                    <input type="number" name="document" class="form-control" id="document" placeholder="CPF/CNPJ do cliente" value="{{ $client->document ?? old('document') }}">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success">Salvar Alterações</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection

@push('script')
    
@endpush