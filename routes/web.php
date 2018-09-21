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


Auth::routes();



//Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware'=>['auth','admin']],function (){

	Route::get('admin', function () {return view('admin.index'); } );
	Route::resource('product','ProductController');
	Route::resource('category','CategoryController');
	Route::resource('SubCategory','SubCategoryController');
	Route::get('admin/orders/{type?}', 'orderController@orders')->name('orders');
	Route::post('delivered/{orderId}', 'orderController@delivered')->name('order.delivered');
	Route::get('shippingInfo/{infoId}', 'orderController@shippingInfo')->name('shipping.info');
	Route::get('users', 'userController@index')->name('users');
	Route::get('users/{id}', 'userController@change')->name('user.change');
	Route::DELETE('users{id}', 'userController@destroy')->name('user.destroy');
});
Route::get('/','pagesController@index')->name('home');
Route::get('categories/{id}','pagesController@category')->name('category');
Route::get('datails/{id}','pagesController@detail')->name('detail');

Route::resource('cart','cartController');
Route::get('cart/additem/{id}', 'cartController@addItem')->name('cart.additem');

Route::get('checkout', 'CheckoutController@shipping')->name('checkout');
Route::post('checkout', 'CheckoutController@store')->name('checkout.store');





