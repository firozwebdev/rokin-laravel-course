<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('pages.product.add-product')->with('categories',$categories);
        
    }

    public function getAllProducts(){
        $categories = Category::all();
        return response()->json([
            'categories' => $categories
        ]);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('image');
        $fileName = $file->getClientOriginalName();
        
        $request->file('image')->move("front_assets/upload/",$fileName);
        if($fileName){
            Product::create([
                'title' => $request->title,
                'category_id' => $request->category_id,
                'image' => $fileName,
                'description' => $request->description,
                'type' => $request->type,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'status' => $request->status,
            ]);
            Session::put('message', 'Save Product Information Successfully !');
            return redirect()->route('add.product');
        }else{
            return "Image is not selected";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
