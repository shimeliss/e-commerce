<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\FrontendController;
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
Route::get('/',[FrontendController::class,'index']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::middleware(['auth','isAdmin'])->group(function(){
        Route::get('/dashboard','App\Http\Controllers\Admin\FrontendController@index');
        
        Route::get('category','App\Http\Controllers\Admin\CategoryController@index');
        //
        Route::get('add-category','App\Http\Controllers\Admin\CategoryController@add');
        
        Route::post('insert-category','App\Http\Controllers\Admin\CategoryController@insert');
        //Route::get('edit-prod/{id}', [CategoryController::class,'edit']);
        Route::get('edit-prod/{id}', 'App\Http\Controllers\Admin\CategoryController@edit');
        Route::post('update-category/{id}', 'App\Http\Controllers\Admin\CategoryController@update');
        Route::get('delete-category/{id}', 'App\Http\Controllers\Admin\CategoryController@destory');
        Route::get('products', 'App\Http\Controllers\Admin\ProductController@index');
        Route::get('add-products', 'App\Http\Controllers\Admin\ProductController@add');
        Route::post('insert-product' , 'App\Http\Controllers\Admin\ProductController@insert'); 
        Route::get('edit-product/{id}','App\Http\Controllers\Admin\ProductController@edit');
        Route::post('update-product/{id}','App\Http\Controllers\Admin\ProductController@update');
        Route::get('delete-product/{id}','App\Http\Controllers\Admin\ProductController@destroy');



    });
         