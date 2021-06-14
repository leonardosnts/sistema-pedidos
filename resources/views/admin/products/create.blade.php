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
                    <a href="{{ route('products.create') }}">Novo cliente</a>
                </li>
            </ul>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Preencha os dados abaixo</div>
                    </div>
                    <form action="{{ route('products.store') }}" method="post">
                    @csrf
                    <div class="card-body">

                        @if(isset($errors) && count($errors) > 0)
                            @foreach ($errors->all() as $error)
                                <div class="col-md-12">
                                    <div class="alert alert-danger">
                                        <p>{{ $error }}</p>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="code">Codigo do produto</label>
                                <input type="text" name="code" class="form-control" id="code" placeholder="Informe o codigo do produto">
                            </div>

                            <div class="form-group">
                                <label for="description">Descrição</label>
                                <input type="text" name="description" class="form-control" id="description" placeholder="Descrição do produto">
                            </div>
                            
                            <div class="form-group">
                                <label for="price">R$ Preço</label>
                                <input type="text" name="price" class="form-control" id="price" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Cadastrar</button>
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