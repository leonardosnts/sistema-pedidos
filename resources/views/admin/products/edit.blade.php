@extends('admin.layout.app')

@section('content')

<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Produtos</h4>
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
                    <a href="{{ route('products.index') }}">Produtos cadastrados</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Editar produto ({{ $product->name }})</a>
                </li>
            </ul>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Preencha os dados abaixo</div>
                    </div>
                    <form action="{{ route('products.update', $product->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="code">Codigo do produto</label>
                                    <input type="text" name="code" class="form-control" id="code" placeholder="Informe o codigo do produto" value="{{ $product->code ?? old('code') }}">
                                </div>
    
                                <div class="form-group">
                                    <label for="description">Descrição</label>
                                    <input type="text" name="description" class="form-control" id="description" placeholder="Descrição do produto" value="{{ $product->description ?? old('description') }}">
                                </div>
                                
                                <div class="form-group">
                                    <label for="price">R$ Preço</label>
                                    <input type="text" name="price" class="form-control" id="price" placeholder="" value="{{ $product->price ?? old('price') }}">
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