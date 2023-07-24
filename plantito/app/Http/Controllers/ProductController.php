<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::query()
        ->select('*')
        ->orderBy('product_id', 'DESC')
        ->get();

        return view('product', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product_new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new Product;
        $product->name = $request->input("name");
        $product->price = $request->input("price");
        $product->stock = $request->input("stock");
        if ($request->file('image')){
            $file = $request->file('image');
            $filename = date('YmdHiu') . $file->getClientOriginalName();
            $file->move(public_path('img'), $filename);
            $product->image = $filename;
        }
        $product->save();
        return redirect('/admin-products');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function restock(Request $request, string $id)
    {
        $product = Product::query()
        ->select('stock', 'name')
        ->where('product_id', '=', $id)
        ->get()
        ->first();

        $new_stock = $product->stock + $request->input('stock_change');
        Product::where('product_id', '=', $id)
        ->update(
            [
                'stock' => $new_stock
            ]
            );

            return redirect('/admin-products')->with('success', 'Added' . $request->input('stock_change') . "to" . $product->name);
    }
}
