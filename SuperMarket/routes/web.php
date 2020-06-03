<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix' => 'Admin'], function () {
    Route::group(['prefix' => 'Products'], function () {
           Route::get('/','ProductController@list')->name('List');
           Route::get('Add','ProductController@add');
           Route::get('Edit/{id}','ProductController@edit');
           Route::post('AddProduct','ProductController@addproduct');
           Route::post('EditProduct','ProductController@editproduct');
           Route::get('Delete/{id}','ProductController@deleteproduct');
           Route::post('MultipleDelete','ProductController@multidelete');
        });
    Route::group(['prefix'=>'Catalog'],function(){
           Route::get('/','CatalogController@list')->name('ListCatalog');
           Route::post('Add','CatalogController@add');
           Route::post('Edit','CatalogController@edit');
           Route::post('Delete/{id}','CatalogController@deletecatalog');
           Route::post('MultipleDelete','CatalogController@multidelete');
    });
    Route::group(['prefix'=>'ProductType'],function(){
           Route::get('/','ProductTypeController@list')->name('ListProductType');
           Route::post('Delete/{id}','ProductTypeController@deletetype');
           Route::post('Add','ProductTypeController@add');
           Route::post('Edit','ProductTypeController@edit');
           Route::post('MultipleDelete','ProductTypeController@multidelete');
    });
    Route::group(['prefix'=>'Order'],function(){
           Route::get('/','OrderController@show')->name('order');
           Route::get('Info/{id}','OrderController@showInfo');
           Route::get('Delete/{id}','OrderController@deleteInfo');
           });
   Route::group(['prefix'=>'Login'],function(){
           Route::get('/','AdminController@Login')->name('login');
           Route::post('Test','AdminController@ActionLogin');
   });
           Route::get('Logout','AdminController@logout');
           Route::get('Index','AdminController@index')->name('index');
});
           Route::get('Home','HomeController@home')->name('home');
           Route::get('Product/{id}','ProductController@showInfo');
           Route::get('Logout','UserController@logout');

   Route::group(['prefix'=>'Checkout'],function(){
           Route::get('/','UserController@checkout');
           Route::post('/','UserController@addcheckout');
});
   Route::group(['prefix'=>'Cart'],function(){
           Route::get('/','CartController@cartShow')->name('cart');
           Route::get('AddCart/{id}','CartController@addcart');
           Route::post('UpdateCart','CartController@updatecart');
           Route::get('DeleteCart/{id}','CartController@deletecart');
});
   Route::group(['prefix'=>'Register'],function(){
           Route::get('/','UserController@register')->name('register');
           Route::post('/','UserController@registeruser');
});
   Route::group(['prefix'=>'Login'],function(){
           Route::get('/','UserController@login')->name('loginuser');
           Route::post('/','UserController@loginuser');
});
           Route::get('Test','UserController@test')->name('success');

           Route::get('Catalog','CatalogController@show');   
           Route::get('CatalogbyType/{id}','CatalogController@showByType');
           Route::get('TestMail','ProductController@testmail');


  