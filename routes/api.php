<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:api'], function(){

	// Route::get('products', function(){
	// 	$products = \App\Product::all();
	// 	return  \App\Http\Resources\ProductResource::collection($products);
	// });

	// Route::get('products/{product}', function(\App\Product $product){
	// 	return new \App\Http\Resources\ProductResource($product);
	// });

	Route::post('products', 'Api\ProductController@store')->name('products.store');
	Route::get('products', 'Api\ProductController@index')->name('products');
	Route::get('products/{product}', 'Api\ProductController@show')->name('products.show');
	Route::delete('products/{product}', 'Api\ProductController@destroy')->name('products.destroy');
	Route::put('products/{product}', 'Api\ProductController@update')->name('products.update');

	//Route::resource('products', 'Api\ProductController');


});


Route::post('login', function(Request $request){
	$data = $request->only('email', 'password'); // ele pega somente os campos que eu indiquei
	$token = \Auth::guard('api')->attempt($data); // tenta fazer o login

	if(!$token){
		return response()->json([
			'error' => 'Crendentials invalid'
		], 400);
	}

	return ['token' => $token];
});