@extends('admin.layout.app')

@section('content')

<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Pedidos</h4>
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
                    <a href="{{ route('purchases.index') }}">Pedidos realizados</a>
                </li>
            </ul>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Pedidos</div>
                        <a href="{{ route('purchases.create') }}" style="margin-top:-35px; float: right;" class="btn btn-sm btn-success">
                            <span class="btn-label">
                                <i class="fa fa-plus"></i>
                            </span>
                            Novo Pedido
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
                                    <th scope="col">Codigo do Pedido</th>
                                    <th scope="col">Cliente</th>
                                    <th scope="col">Valor Total</th>
                                    <th scope="col">Data do pedido</th>
                                    <th scope="col">Ação</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($sales as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>R$ {{ number_format($item->value_total, 2, ',', '.') }}</td>
                                        <td>{{ date('d/m/Y', strtotime($item->created_at)) }}</td>
                                        <td>
                                            <a href="{{ route('purchases.show', $item->id) }}" class="btn btn-sm btn-primary">Detalhes</a>
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