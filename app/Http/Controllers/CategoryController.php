<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    public function saveCategory(Request $request){
        
        $category = new Category;
        $category->name = $request->categoryName;
        $category->description = $request->categoryDescription;
        $category->save();

        return redirect()->route('category')->with('successMessage','Category is saved');
    }
}
