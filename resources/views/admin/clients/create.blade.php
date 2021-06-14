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
                    <a href="{{ route('clients.create') }}">Novo cliente</a>
                </li>
            </ul>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Preencha os dados abaixo</div>
                    </div>
                    <form action="{{ route('clients.store') }}" method="post">
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
                                <label for="name">Nome</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Nome completo do cliente">
                            </div>
                            
                            <div class="form-check">
                                <label>Pessoa</label><br>
                                <label class="form-radio-label">
                                    <input class="form-radio-input" id="type" type="radio" name="type" value="PF" checked onclick="validateDocument('PF')">
                                    <span class="form-radio-sign">Fisica</span>
                                </label>
                                <label class="form-radio-label ml-3">
                                    <input class="form-radio-input" id="type" type="radio" name="type" value="PJ"  onclick="validateDocument('PJ')">
                                    <span class="form-radio-sign">Juridica</span>
                                </label>
                            </div>
                            
                            <div class="form-group">
                                <label for="document">Documento</label>
                                <input type="text" name="document" class="form-control" id="document">
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

<script>

    
    function validateDocument(value){        
        if (value == 'PJ'){
            $('#document').attr('maxlength', 14)
            $('#document').attr('placeholder', 'CNPJ do cliente')
            $('#document').mask('00.000.000/0000-00', {reverse: true});
        } else {
            $('#document').attr('maxlength', 11)
            $('#document').attr('placeholder', 'CPF do cliente')
            $('#document').mask('000.000.000-00', {reverse: true});
        }
    }
    validateDocument()


</script>

@endpush