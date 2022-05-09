<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Order\OrderController;
use App\Http\Controllers\Site\Cart\CartController;
use App\Http\Controllers\Site\Category\CategoryController as CategoryCategoryController;
use App\Http\Controllers\Site\Product\ProductController as ProductProductController;
use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

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

//Route::get('/admin', function () {
//    return 'admin';
//});
//Route::get('/admin/product', function () {
//    return 'danh sach';
//});
//Route::get('/admin/add', function () {
//    return 'them sp';
//});
//Route::get('/admin/del', function () {
//    return 'xoa sp';
//});
//Route::get("/test1/{data1}/{data2}", [TestController::class, "test1"]);
// Route::get("/test1", [TestController::class, "test1"]);
// Route::get("/test", function (){
// DB::table('categories')->insert(["name"=>"vay nam","slug"=>"vay-nam","parent"=>1]);
// DB::table('categories')->insert([
//     ["name"=>"vay nam dep","slug"=>"vay-nam-dep","parent"=>1],
//     ["name"=>"vay nam xau","slug"=>"vay-nam-xau","parent"=>2],

// ]
//     Route::get("/test", function(){
//         // $data = DB::table('products')->get()->all();
//         // dd($data);
//         // $data = DB::table('categories')->where('name', 'nam')->get();
//         // dd($data);
//         $data = DB::table('products')->join('categories', 'products.categories_id', '=', 'categories.id')
//         ->select('products.name as products_name', 'categories.name as categories_name')
//         ->get()->all();
// dd($data);


//     });


// });

// Schema::table('test', function($table){
//     $table->string('name');
// });
// if(Schema::hasTable('test')){
//     return 'co bang';
// }
// if(Schema::hasColumn('test', 'name')){
//     return 'co cot name';
// }


// });
Route::get("/test", [TestController::class, "test1"]);
// Route::get("/upload", "TestController@frmUpload");
// Route::post("/upload", "TestController@uploadFile");

//BACK END
Route::group(["prefix" => "login", "middleware" => "CheckLogin"], function () {
    Route::get('/', [AuthController::class, "getLogin"]);
    Route::post('/', [AuthController::class, "postLogin"]);
});
Route::group(["prefix" => "admin", "middleware" => "CheckAdmin"], function () {
    Route::get('/', [AdminController::class, "index"]);
    Route::get('/logout', [AdminController::class, "logout"]);
    Route::group(["prefix" => "product"], function () {
        Route::get('/', [ProductController::class, "index"]);
        Route::get('/create', [ProductController::class, "create"]);
        Route::post('/store', [ProductController::class, "store"]);
        Route::get('/edit/{id}', [ProductController::class, "edit"]);
        Route::post('/update/{id}', [ProductController::class, "update"]);
        Route::get('/delete/{id}', [ProductController::class, "delete"]);
    });
    Route::group(["prefix" => "user"], function () {
        Route::get('/', [UserController::class, "index"]);
        Route::get('/create', [UserController::class, "create"]);
        Route::post('/store', [UserController::class, "store"]);
        Route::get('/edit', [UserController::class, "edit"]);
        Route::post('/update', [UserController::class, "update"]);
        Route::get('/delete', [UserController::class, "delete"]);
    });
    Route::group(["prefix" => "category"], function () {
        Route::get('/', [CategoryController::class, "index"]);
        Route::get('/edit', [CategoryController::class, "edit"]);
        Route::post('/update', [CategoryController::class, "update"]);
        Route::get('/delete', [CategoryController::class, "delete"]);
    });
    Route::group(["prefix" => "order"], function () {
        Route::get('/', [OrderController::class, "order"]);
        Route::get('/details/{id}', [OrderController::class, "details"]);
        Route::get('/processed', [OrderController::class, "processed"]);
    });
});

//FRONT END

Route::group(["prefix" => "/"],function (){
    Route::get("/",[SiteController::class,"index"]);
    Route::get("/ve-chung-toi",[SiteController::class,"about"]);
    Route::get("/lien-he",[SiteController::class,"contact"]);
});

Route::group(["prefix" => "/danh-muc"],function (){
    Route::get("/{slug}.html",[CategoryCategoryController::class,"index"]);
});
Route::group(["prefix" => "/san-pham"],function (){
    Route::get("/",[ProductProductController::class,"shop"]);
    Route::get("/tim-kiem",[ProductProductController::class,"filter"]);
    Route::get("/{slug}.html",[ProductProductController::class,"details"]);
});
Route::group(["prefix" => "/gio-hang"],function (){
    Route::get("/",[CartController::class,"cart"]);
    Route::get("/them-hang/{id}",[CartController::class,"addToCart"]);
    Route::get("/cap-nhat-gio-hang/{rowId}/{qty}",[CartController::class,"update"]);
    Route::get("/xoa-hang/{id}",[CartController::class,"delete"]);
    Route::get("/thanh-toan.html",[CartController::class,"checkout"]);
    Route::post("/thanh-toan",[CartController::class,"payment"]);
    Route::get("/hoan-thanh",[CartController::class,"complete"]);
});