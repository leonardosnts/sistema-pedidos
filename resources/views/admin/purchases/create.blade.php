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
                        <div class="card-title">Preencha os dados abaixo</div>
                    </div>
                    <form id="form-purchase">
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

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="client">Cliente</label>
                                <select class="form-control" name="client_id" id="client-id">
                                    <option value="">Selecione o cliente </option>
                                    @foreach ($clients as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="product">Produtos</label>
                                <select class="form-control" name="product_id" id="product">
                                    <option value="">Selecione o produto </option>
                                    @foreach ($products as $item)
                                        <option value="{{ $item->id }}">{{ $item->description }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="amount">Quantidade</label>
                                <input type="number" name="amount" id="amount" class="form-control">
                            </div>

                            <div class="form-group">
                                <button type="button" class="btn btn-info" id="btn-add-product">Adicionar</button>                                
                            </div>

                            <table class="table table-head-bg-primary mt-4">
                                <thead class="text-center">
                                    <tr>
                                        <th scope="col">Produto</th>
                                        <th scope="col">Preço Unitário</th>
                                        <th scope="col">Quantidade</th>
                                        <th scope="col">Ação</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center" id="table-product">
                                </tbody>
                            </table>
              
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-success" id="btn-store">Salvar Pedido</button>
                    </div>
                </form>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection

@push('script')

    <script>

        $(document).ready(function(){

            let btnAddProductEl = $('#btn-add-product')
            let btnStoreEl = $('#btn-store')
            var products = []

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });

            const renderTable = obj => {
                return $('#table-product').append('<tr class="trlinha" id="tr-product' + obj.id + '">' +
                    '<td><span>' + obj.description + '</span></td>' +
                    '<td><span>R$ ' + parseFloat(obj.price).toFixed(2) + '</span></td>' +
                    '<td><span id="amount'+ obj.id +'">' + $('#amount').val() + '</span></td>' +
                    '<td><button id="' + obj.id + '" type="button"  class="btn btn-danger btn-sm mt-1 btnRemoveProduct"><i class="fa fa-minus-circle"></i></button></td>' +
                    '</tr>'
                );
            }

            btnAddProductEl.click(function(){

                let idProduct = $('#product').val()

                $.ajax({
                    type: 'GET',
                    url: `{{ url('admin/produtos/${idProduct}') }}`,
                    dataType: 'json',
                    data: idProduct,
                    beforeSend: function(){
                        btnAddProductEl.attr('disabled', true);
                    },
                    success: function(response){
                        renderTable(response)
                        btnAddProductEl.attr('disabled', false);

                        $.notify({
                        // options
                        icon: 'glyphicon glyphicon-shopping-cart',
                        title: 'Produto',
                        message: 'Produto adicionado com sucesso' 
                        },{
                            // settings
                            type: 'info'
                        });

                        let product = {
                            'id': response.id,
                            'code': response.code,
                            'description': response.description,
                            'price': response.price,
                            'amount': $(`#amount`).val(),
                        }

                        products.push(product)
                        console.log(products)
                    }
                })

            })

            btnStoreEl.click(function(){
                console.log(products);

                let clientId = $('#client-id').val();
                

                if (products.length <= 0){
                    $.notify({
                    // options
                    title: 'Pedido',
                    message: 'Para realizar um pedido, selecione pelo menos 1 produto!' 
                    },{
                        // settings
                        type: 'Danger'
                    });
                } else {
                    $.ajax({
                        type: 'POST',
                        url: `{{ url('admin/pedidos/cadastro') }}`,
                        data: {
                            clientId,
                            'items': products,
                        },
                        beforeSend: function(){
                            btnAddProductEl.attr('disabled', true);
                        },
                        success: function(response){
                            
                            $.notify({
                            // options
                            title: 'Pedido',
                            message: 'Pedido registrado com successo' 
                            },{
                                // settings
                                type: 'Success'
                            });
    
                            setTimeout(() => {
                                window.location.href = "{{ url('admin/pedidos') }}"
                            }, 3000);
    
                        }
                    })
                }


            })

            $('#table-product').on('click', '.btnRemoveProduct', function() {
                    var button_id = $(this).attr("id")
                    var indice = products.indexOf(button_id);
                    $('#tr-product' + button_id + '').remove()
                    products.splice(indice);
         
            });
        });


    </script>

@endpush