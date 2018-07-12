<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [
    'uses' => 'DashboardController@index',
    'as' =>'dashboard'
]);
Route::get('/category', [
    'uses' => 'CategoryController@category',
    'as' =>'category'
]);
Route::post('/category', [
    'uses' => 'CategoryController@saveCategory',
    'as' =>'category.save'
]);
Route::get('/manage-category', [
    'uses' => 'CategoryController@manageCategory',
    'as' =>'category.manage'
]);
Route::get('/edit-category/{id}', [
    'uses' => 'CategoryController@editCategory',
    'as' => 'category.edit'
]);
Route::post('/update-category', [
    'uses' => 'CategoryController@updateCategory',
    'as' =>'category.update'
]);
Route::get('/delete-category/{id}', [
    'uses' => 'CategoryController@deleteCategory',
    'as' =>'category.delete'
]);

// Route::get('/product', [
//     'uses' => 'ProductController@index',
//     'as' =>'add.product'
// ]);
// Route::get('/product/{id}', [
//     'uses' => 'ProductController@product_by_id',
   
// ]);
// Route::post('/product', [
//     'uses' => 'ProductController@store',
//     'as' =>'product.save'
// ]);

Route::resource('products','ProductController');
// Route::post('/update-ajax-category', [
//     'uses' => 'ProductController@ajaxUpateCategory',
//     'as' =>'ajax.update'
// ]);


// Route::get('/products', [
//     'uses' => 'ProductController@getAllProducts',
//     //'as' =>'add.product'
// ]);

