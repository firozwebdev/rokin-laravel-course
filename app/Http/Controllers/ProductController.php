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
       $products = Product::all();
        return view('pages.product.index')->with('products',$products);
    }

    // public function getAllProducts(){
    //     $categories = Category::all();
    //     return response()->json([
    //         'categories' => $categories
    //     ]);
       
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('pages.product.add-product')->with('categories',$categories);
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
                'slug' => str_slug($request->title),
                'category_id' => $request->category_id,
                'image' => $fileName,
                'description' => $request->description,
                'type' => $request->type,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'status' => $request->status,
            ]);
            Session::put('message', 'Save Product Information Successfully !');
            return redirect()->route('products.create');
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
       
        return view('pages.product.single-product')->with('product',$product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    // 'title' => $request->title,
    // 'slug' => str_slug($request->title),
    // 'category_id' => $request->category_id,
    // 'image' => $fileName,
    // 'description' => $request->description,
    // 'type' => $request->type,
    // 'price' => $request->price,
    // 'quantity' => $request->quantity,
    // 'status' => $request->status,

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('pages.product.edit-product')->with([
            'categories'=> $categories,
            'product' => $product
        ]);
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
        $product->title = $request->title;
        $product->slug = $product->slug == str_slug($request->title) ? $product->slug: str_slug($request->title);
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->type = $request->type;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->status = $request->status;

        
        
       
        if($request->has('image')){
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $request->file('image')->move("front_assets/upload/",$fileName);
            $product->image = $fileName;
        }

        $product->save();

        Session::put('message', 'Update Product Information Successfully !');
        return redirect()->route('products.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.edit');
    }


    // public function product_by_id($id)
    // {
    //     $category = Category::findOrFail($id);
    //     return response()->json([
    //         'category' => $category
    //     ]);
    // }

    // public function ajaxUpateCategory(Request $request){
    //     //return $request->category['categoryId'];
    //     $category = Category::findOrFail($request->category['categoryId']);
    //     $category->name = $request->category['categoryName'];
    //     $category->description = $request->category['categoryDescription'];
    //     $category->save();
    //     return response()->json([
    //         'message' => "Category is updated"
    //     ]);
    // }


}
