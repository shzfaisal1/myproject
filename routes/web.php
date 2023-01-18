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
    return view('admin.dashboard');
});




Route::get('image-upload',[App\Http\Controllers\ImageController::class,'index']);
Route::post('image-upload',[App\Http\Controllers\ImageController::class,'store'])->name('image.store');



Route::get('/users/list',[App\Http\Controllers\UsersController::class,'index']);
Route::get('/users/form',[App\Http\Controllers\UsersController::class,'create']);
Route::post('/users/store',[App\Http\Controllers\UsersController::class,'store']);
Route::get('/users/delete/{id}',[App\Http\Controllers\UsersController::class,'destroy']);
Route::get('/users/edit/{id}',[App\Http\Controllers\UsersController::class,'edit']);
Route::put('/users/update/{id}',[App\Http\Controllers\UsersController::class,'update']);



/* json hridayam sofotware solution form */
Route::get('/json/form',[App\Http\Controllers\JsonController::class,'index']);
Route::post('/save',[App\Http\Controllers\JsonController::class,'store']);
Route::post('json/fetch/state/{id}',[App\Http\Controllers\JsonController::class,'fetech_state']);
Route::post('json/fetch/city/{id}',[App\Http\Controllers\JsonController::class,'fetch_city']);



Route::get('/machine/form',[App\Http\Controllers\MachinetestController::class,'create']);
Route::post('/machine/fetch/state/{id}',[App\Http\Controllers\MachinetestController::class,'fetch_state']);

Route::post('/machine/fetch/city/{id}',[App\Http\Controllers\MachinetestController::class,'fetch_city']);

Route::post('/save/data',[App\Http\Controllers\MachinetestController::class,'store']);

Route::get('/list',[App\Http\Controllers\MachinetestController::class,'show']);



// ecommerce 
Route::get('/admin',[App\Http\Controllers\LoginController::class,'index']);
Route::post('/admin/login',[App\Http\Controllers\LoginController::class,'login_check']);


Route::group(['middleware' => 'isAdmin'],function(){
    Route::get('/admin/dashboard',[App\Http\Controllers\LoginController::class,'dashboard']);
    Route::get('/category/list',[App\Http\Controllers\CategoryController::class,'index']);
    Route::get('/category/create',[App\Http\Controllers\CategoryController::class,'create'])->name('create.category');
    Route::post('/category/manage/process',[App\Http\Controllers\CategoryController::class,'category_manange_process'])->name('category.insert');
    Route::get('/category/edit/{id}',[App\Http\Controllers\CategoryController::class,'edit']);
    Route::get('/category/delete/{id}',[App\Http\Controllers\CategoryController::class,'destroy']);
    Route::post('/category/update/{id}',[App\Http\Controllers\CategoryController::class,'update']);
    
    Route::get('/category/{status}/{id}',[App\Http\Controllers\CategoryController::class,'status']);


    Route::prefix('coupon')->group(function (){
       
        Route::get('/create',[App\Http\Controllers\CouponController::class,'create'])->name('coupon');
        Route::post('/add',[App\Http\Controllers\CouponController::class,'store'])->name('coupon.store');
        Route::get('/list',[App\Http\Controllers\CouponController::class,'index'])->name('coupon.list');
        Route::get('/edit/{id}',[App\Http\Controllers\CouponController::class,'edit']);
        Route::post('/update/{id}',[App\Http\Controllers\CouponController::class,'update']);
        
        Route::get('/delete/{id}',[App\Http\Controllers\CouponController::class,'destroy']);
        Route::get('/status/{status}/{id}',[App\Http\Controllers\CouponController::class,'status']);
       

        

    });

    Route::prefix('size')->group(function(){

        Route::get('/create',[App\Http\Controllers\SizeController::class,'create']);
        Route::get('/list',[App\Http\Controllers\SizeController::class,'index'])->name('size.list');
        Route::get('/delete/{id}',[App\Http\Controllers\SizeController::class,'destroy']);
        Route::get('/edit/{id}',[App\Http\Controllers\SizeController::class,'edit']);
        Route::post('/update/{id}',[App\Http\Controllers\SizeController::class,'update']);

        Route::get('/status/{status}/{id}',[App\Http\Controllers\SizeController::class,'status']);



        Route::post('/add',[App\Http\Controllers\SizeController::class,'store'])->name('size.store');

    });

    Route::prefix('color')->group(function(){

        Route::get('/create',[App\Http\Controllers\ColorController::class,'create']);
        Route::get('/list',[App\Http\Controllers\ColorController::class,'index'])->name('color.list');
        Route::get('/delete/{id}',[App\Http\Controllers\ColorController::class,'destroy']);
        Route::get('/edit/{id}',[App\Http\Controllers\ColorController::class,'edit']);
        Route::post('/update/{id}',[App\Http\Controllers\ColorController::class,'update']);

        Route::get('/status/{status}/{id}',[App\Http\Controllers\ColorController::class,'status']);



        Route::post('/add',[App\Http\Controllers\ColorController::class,'store'])->name('color.store');

    });

    Route::prefix('product')->group(function(){
       
        Route::get('/create',[App\Http\Controllers\ProductController::class,'create'])->name('product.create');
        Route::get('/list',[App\Http\Controllers\ProductController::class,'index'])->name('product.list');
        Route::get('/delete/{id}',[App\Http\Controllers\ProductController::class,'destroy'])->name('product.delete');
        Route::get('/edit/{id}',[App\Http\Controllers\ProductController::class,'edit'])->name('product.edit');
        Route::post('/update/{id}',[App\Http\Controllers\ProductController::class,'update'])->name('product.update');
        Route::get('/status/{status}/{id}',[App\Http\Controllers\ProductController::class,'status']);
        Route::post('/add',[App\Http\Controllers\ProductController::class,'store'])->name('product.store');
       
    });

    Route::post('/store/product-attribute',[App\Http\Controllers\ProductController::class,'product_attr'])->name('product.attribute');

    Route::prefix('brand')->group(function(){
    Route::get('/create',[App\Http\Controllers\BrandController::class,'create']);
    Route::post('/store',[App\Http\Controllers\BrandController::class,'store'])->name('store.brand');


});
});