<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StocksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.stocks.index', ['products' => Product::latest()->get(), 'stocks' => Stock::orderBy('id', 'desc')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'stock_qty' => ['required', 'integer']
        ]);
        // dd($validatedData);
        $stock = new Stock;

        $stock->product_name = Product::find($request->stocks_product_name)->product_name;
        $stock->product_status = Product::find($request->stocks_product_name)->product_status;
        $stock->stock_prod_qty = $validatedData['stock_qty'];
        // dd($stock);
        $stock->save();

        DB::table('inventories')->insert([
            'product_name' => $stock->product_name,
            'stock_in' => $stock->stock_prod_qty,
            'created_at' => $stock->created_at,
            'updated_at' => $stock->updated_at,
        ]);


        return redirect()->route('stocks.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
