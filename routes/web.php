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

Route::group([], function() {

	//открытая часть пользовательской части
	Route::match(['get','post'], '/', ['uses'=>'IndexController@execute', 'as'=>'home']);
	Route::get('/product/{id}',['uses'=>'ProductController@execute', 'as'=>'product']);
	Route::any('/search',['uses'=>'IndexController@searchProduct', 'as'=>'searchres']);
	
	// закрытая часть для работы системы аутентификации
	Route::auth();
	Route::get('/logout','Auth\LoginController@logout');

});

// Route::get('/create', function(){
//    App\User::create([
//        'name' => 'SomeName',
//        'email' => 'some@mail',
//        'login' => 'somelogin',
//        'password' => bcrypt('SomePassword'),
//    ]);
// });

Route::group(['prefix'=>'admin', 'middleware'=>'auth'], function() {

	Route::get('/', function() {
		if (view()->exists('admin.index')) {
			$data = ['title' => 'Admin Panel',];
			return view('admin.index',$data);
		}
	});

	Route::group(['prefix'=>'pages'], function() {
		Route::get('/',['uses'=>'PagesController@execute', 'as'=>'pages']);
		Route::match(['get','post'],'/add',['uses'=>'PagesAddController@execute', 'as'=>'pagesAdd']);
		Route::match(['get','post','delete'],'/edit/{page}',['uses'=>'PagesEditController@execute', 'as'=>'pagesEdit']);
		
	});

	Route::group(['prefix'=>'products'], function() {
		Route::get('/',['uses'=>'ProductsController@execute', 'as'=>'products']);
		Route::match(['get','post'],'/add/{page_id?}',['uses'=>'ProductsAddController@execute', 'as'=>'productsAdd']);
		Route::match(['get','post','delete'],'/edit/{product}',['uses'=>'ProductEditController@execute', 'as'=>'productEdit']);
		Route::any('/delProdSlide/{product}',['uses'=>'ProductEditController@delProdSlide', 'as'=>'delProdSlide']);
		
	});

	Route::group(['prefix'=>'sliders'], function() {
		Route::get('/',['uses'=>'SlidersController@execute', 'as'=>'sliders']);
		Route::match(['get','post'],'/add',['uses'=>'SlidersAddController@execute', 'as'=>'slidersAdd']);
		Route::match(['get','post','delete'],'/edit/{slider}',['uses'=>'SliderEditController@execute', 'as'=>'sliderEdit']);
		
	});

});

Auth::routes();
Route::get('/home', 'HomeController@index');
