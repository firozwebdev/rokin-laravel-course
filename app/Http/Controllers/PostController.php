<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        
        return view('posts.index')->with('products',$products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('posts.create')->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {
        $file = $request->file('image');
        $fileName = time().$file->getClientOriginalName();
        
        $request->file('image')->move("assets/upload/",$fileName);

        if($fileName){
            // Product::create([
            //     'title' => $request->title,
            //     'slug' => str_slug($request->title),
            //     'category_id' => $request->category_id,
            //     'image' => $fileName,
            //     'description' => $request->description,
            //     'type' => $request->type,
            //     'price' => $request->price,
            //     'quantity' => $request->quantity,
            //     'status' => $request->status,
            // ]);

            $product->title = $request->title;
            $product->slug = str_slug($request->title);
            $product->category_id = $request->category_id;
            $product->image = $fileName;
            $product->description = $request->description;
            $product->type = $request->type;
            $product->price = $request->price;
            $product->quantity = $request->quantity;
            $product->status = $request->status;

            $product->save();


            Session::put('message', 'Save Product Information Successfully !');
            return redirect()->route('posts.create');
        }else{
            return "Image is not selected";
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id )
    {   
        $categories = Category::all();
        $product = Product::findOrFail($id);
        //return $product;
        return view('posts.edit')->with([
            'product'=>$product,
            'categories' => $categories,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $product = Product::findOrFail($id);
        if($request->hasfile('image')){
            $file = $request->file('image');
            $fileName = time().$file->getClientOriginalName();
            $request->file('image')->move("assets/upload/",$fileName);
            $product->image = $fileName;
        }
       

            $product->title = $request->title;
            $product->slug = str_slug($request->title);
            $product->category_id = $request->category_id;
           
            $product->description = $request->description;
            $product->type = $request->type;
            $product->price = $request->price;
            $product->quantity = $request->quantity;
            $product->status = $request->status;

            $product->save();


            Session::put('message', 'Update Product Information Successfully !');
            return redirect()->route('posts.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        Session::put('message', 'Delete !');
        return redirect()->route('posts.index');
    }
}
