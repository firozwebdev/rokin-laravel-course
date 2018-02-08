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
    'uses' => 'DashboardController@category',
    'as' =>'category'
]);
Route::post('/category', [
    'uses' => 'CategoryController@saveCategory',
    'as' =>'category.save'
]);

Route::get('/product', [
    'uses' => 'DashboardController@product',
    'as' =>'product'
]);


