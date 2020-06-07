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

// Route::get('/', function () {

//     return view('welcome');
// });

Route::match(['get','post'],'/','IndexController@index');
Route::get('/products/{id}', 'ProductsController@products');
Route::match(['get', 'post'], '/admin', 'AdminController@login');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' =>['auth']],function()
{
	Route::match(['get', 'post'], '/admindashboard', 'AdminController@dashboard');


//Category Route
 Route::match(['get', 'post'], '/admin/add-category','CategoryController@addcategory');
 Route::get('/admin/view-category', 'CategoryController@viewcategories');
 Route::match(['get','post'], '/admin/edit-category/{id}', 'CategoryController@editcategory');
 Route::get('/admin/delete-category/{id}', 'CategoryController@deletecategory');
 Route::post('/admin/update-category-status', 'CategoryController@updateStatus');



//Products Route
    Route::match(['get', 'post'], '/admin/add-products','ProductsController@addproduct');
    Route::get('/admin/view-products','ProductsController@viewproducts');
    Route::match(['get', 'post'], '/admin/edit-product/{id}','ProductsController@editproduct');
    Route::match(['get','post'], '/admin/delete-product/{id}', 'ProductsController@deleteproduct');

    Route::post('/admin/update-product-status', 'ProductsController@updateStatus');


//Products Attributes
  Route::match(['get', 'post'], '/admin/add-attributes/{id}' , 'ProductsController@addAttributes');


// Banners Route
    Route::match(['get', 'post'], '/admin/banners', 'BannersController@banners');
    Route::match(['get' , 'post'], '/admin/add-banner', 'BannersController@addBanner');
    Route::match(['get' , 'post'], '/admin/edit-banner/{id}', 'BannersController@editBanner');
});

Route::get('/logout', 'AdminController@logout');
