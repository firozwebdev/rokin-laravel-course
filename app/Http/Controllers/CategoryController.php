<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    public function category()
    {
        return view('pages.category.category');
    }

    public function saveCategory(Request $request){
        
        $category = new Category;
        $category->name = $request->categoryName;
        $category->description = $request->categoryDescription;
        $category->save();

        return redirect()->route('category.manage')->with('successMessage','New Category is saved');
    }

    public function manageCategory(){
        $categories = Category::orderBy('id','DESC')->get();
        return view('pages.category.manage-category')->with('categories',$categories);
    }

    public function editCategory($id)
    {
        $category = Category::findOrFail($id);
       
        return view('pages.category.edit-category')->with('category',$category);
    }

    public function updateCategory(Request $request){
        $category = Category::findOrFail($request->id);
        $category->name = $request->categoryName;
        $category->description = $request->categoryDescription;
        $category->save();

        return redirect()->route('category.manage')->with('successMessage','Category was updated');
    }

    public function deleteCategory($id){
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('category.manage')->with('successMessage','Category is deleted');
    }
}
