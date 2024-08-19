<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get("/createnewadmin10", function(){
    return view("admin.createnewadmin");
});
Route::get('/admin-login',[AdminController::class,'show'])->name("login");

Route::post('/check-admin-login', [AdminController::class,'login'])->name("checkadminlogin");
Route::get('/logout', [AdminController::class,"logout"])->name("logout");
Route::post('/storeadmin', [AdminController::class,'store'])->name("storeadmin");


Route::get("/dashboard",[AdminController::class,'index'])->name("dashboard")->middleware("auth");
Route::get("/dashboard/products",[ProductController::class,'index'])->name("dashboard-product")->middleware("auth");
Route::get("/dashboard/add-product",[ProductController::class,'create'])->name("add-product")->middleware("auth");

//addcategory

Route::get("/dashboard/category",[CategoryController::class,'index'])->name('category')->middleware("auth");
Route::post("dashboard/savecat",[CategoryController::class,'store'])->name('savecat')->middleware("auth");
Route::post("dashboard/upcat/{id}",[CategoryController::class,'update'])->name('upcat')->middleware("auth");


