<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index', [
            'columns' => Schema::getColumnListing('products'),
            'items' =>  Product::all(),
            'url_create' => route('products.create')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create', [
            'columns' => Schema::getColumnListing('products'),
            'action' => route('products.store')
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
        $validated = Product::validate($request);

        $uri = Product::createUriImage($request);

        Product::create(
            array_merge($validated, ['image' => $uri])
        );
        

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        if (!$product)
            abort(404);

        return view('admin.edit', [
            'action' => route('products.update', ['product' => $id]),
            'columns' => Schema::getColumnListing('products'),
            'item' => $product,
        ]);
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
        $validated = Product::validate($request);

        $product = Product::find($id);
        $file = explode('/', $product->image)[4];

        if (Storage::disk('public')->delete($file)) {

            $uri = Product::createUriImage($request);

            $product->update( 
                array_merge($validated, ['image' => $uri])
            );
        }


        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }


    public function delete(Request $request) 
    {
        $data = array_map('intval', explode('&', $request->id));

        $products = Product::whereIn('id', $data)->get();

        foreach ($products as $product) {            
            $file = explode('/', $product->image)[4];

            Storage::disk('public')->delete($file);
        }

        Product::destroy($data);

        return redirect()->route('products.index');
    }
}
