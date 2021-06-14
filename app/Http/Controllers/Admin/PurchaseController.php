<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleProduct;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sale::join('clients', 'sales.client_id', '=', 'clients.id')
                ->select('clients.name', 'sales.*')
                ->get();

        return view('admin.purchases.index',[
            'sales' => $sales
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all();
        $products = Product::all();

        return view('admin.purchases.create',[
            'clients' => $clients,
            'products' => $products
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        $products = $request->items;
        $valueTotal = null;

        foreach ($products as $value) {
            $result = $value['price'] * $value['amount'];
            $valueTotal += $result;
        }

        $sale = new Sale();
        $sale->client_id = $request->clientId;
        $sale->value_total = $valueTotal;

        if ($sale->save()) {

            foreach ($products as $value) {
                
                $saleProducts = new SaleProduct();
                
                $saleProducts->sale_id = $sale->id;
                $saleProducts->product_id = $value['id'];
                $saleProducts->client_id = $request->clientId;
                $saleProducts->amount = $value['amount'];
                $saleProducts->value_product = $value['price'];

                $saleProducts->save();
            }

            return response()->json(['message' => 'Pedido registrado com sucesso']);

        } else {
            return response()->json(['message' => 'algo deu errado']);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   

        $sale = Sale::find($id);

        $client = SaleProduct::join('clients', 'sale_products.client_id', '=', 'clients.id')
                    ->where('sale_products.sale_id', $id)
                    ->first();

        $products = SaleProduct::join('products', 'sale_products.product_id', '=', 'products.id')
                    ->select('sale_products.amount', 'sale_products.value_product', 'products.*')
                    ->where('sale_products.sale_id', $id)
                    ->get();

        return view('admin.purchases.show',[
            'sale' => $sale,
            'client' => $client,
            'products' => $products
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
