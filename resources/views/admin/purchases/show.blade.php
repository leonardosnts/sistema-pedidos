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
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="{{ route('purchases.create') }}">Novo pedido</a>
                </li>
            </ul>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Detalhes do pedido #{{ $sale->id }}</div>
                    </div>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Codigo do produto</th>
                            <th scope="col">Produto</th>
                            <th scope="col">Quantidade</th>
                            <th scope="col">Valor Unitário</th>
                            <th scope="col">Valor Total</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($products as $item)
                            <tr>
                                <th scope="row">#{{ $item->code }}</th>
                                <th scope="row">{{ $item->description }}</th>
                                <th scope="row">{{ $item->amount }}</th>
                                <th scope="row">R$ {{ number_format($item->value_product, 2, ',', '.') }}</th>
                                <th scope="row">R$ {{ number_format($item->value_product * $item->amount, 2, ',', '.') }}</th>
                            </tr>
                        @endforeach
                        </tbody>
                      </table>
                </div>

                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Valor total R$ {{ number_format($sale->value_total, 2, ',', '.') }}</div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection

@push('script')

    <script>



    </script>

@endpush