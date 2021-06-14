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
            </ul>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Produtos</div>
                        <a href="{{ route('products.create') }}" style="margin-top:-35px; float: right;" class="btn btn-sm btn-success">
                            <span class="btn-label">
                                <i class="fa fa-plus"></i>
                            </span>
                            Novo Produto
                        </a>
                    </div>

                    @if(session('message'))
                        <div class="col-md-12">
                            <div class="alert alert-success mt-3">
                                <p>{{session('message')}}</p>
                            </div>
                        </div>
                    @endif

                    <div class="card-body">
                        <table class="table table-head-bg-primary mt-4">
                            <thead class="text-center">
                                <tr>
                                    <th scope="col">Codigo do produto</th>
                                    <th scope="col">Descrição</th>
                                    <th scope="col">Preço</th>
                                    <th scope="col">Ação</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($products as $item)
                                    <tr>
                                        <td>{{ $item->code }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>R${{ number_format($item->price, 2, ',', '.') }}</td>
                                  
                                        <td>
                                            <a href="{{ route('products.edit', $item->id) }}" title="Editar" class="btn btn-sm btn-info"> <i class="fa fa-edit"></i> </a>
                                            <form style="display: contents" action="{{ route('products.destroy', $item->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" title="Excluir" class="btn btn-sm btn-danger">  <i class="fas fa-trash-alt"></i></button type="submit">
                                            </form>
                                        </td>
                                    </tr>
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

@push('script')
    
@endpush