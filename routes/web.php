<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\CourseController;
use App\Http\Controllers\Frontend\ServiceController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[HomeController::class,'index']);
Route::get('/about',[AboutController::class,'index']);
Route::get('/contact',[ContactController::class,'index']);
Route::get('/course',[CourseController::class,'index']);
Route::get('/service',[ServiceController::class,'index']);

Route::get('/add',[CustomerController::class,'add']);
Route::get('/view',[CustomerController::class,'index']);
Route::get('/update',[CustomerController::class,'update']);

Route::prefix('admin')->group( function(){
    Route::controller(CategoryController::class)->group(function () {
        Route::get('category','index');
        Route::get('category/create','create');
        Route::post('category','store');
        Route::get('category/{id}/edit','edit');
        Route::put('category/{id}','update');
        Route::get('category/{category}/delete','destroy');

    });

    Route::controller(ProductController::class)->group(function () {
        Route::get('products','index');
        Route::get('products/create','create');
        Route::post('products','store');
        Route::get('products/{product}/edit','edit');
        Route::put('products/{product}','update');
        Route::get('products/{product}/delete','destroy');
    });
});

Route::get('/upload', function(){
    return view('upload');
});

Route::post('/upload',[ContactController::class,'upload']);





