<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\ProductimgController;


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
Route::get("/dashboard/editproduct/{id}",[ProductController::class,'edit'])->name("edit-product")->middleware('auth');
Route::get("/dashboard/deleteproduct/{id}",[ProductController::class,'destroy'])->name("delete-product")->middleware("auth");
Route::post("/dashboard/store-product",[ProductController::class,'store'])->name("store-product")->middleware("auth");
Route::get("/dashboard/getsubcatforpro/{id}",[ProductController::class,'getcats'])->name("getcats")->middleware("auth");
Route::get("/dashboard/editproduct/getsubcatforpro/{id}",[ProductController::class,'getcats'])->name("getcats")->middleware("auth");
Route::Post("dashboard/editproduct/updateproduct/{id}",[ProductController::class,'Update'])->name("updateproduct")->middleware("auth");
//get image
Route::get("dashboard/editproduct/getimages/{id}",[ProductimgController::class,'show'])->name("getimages")->middleware("auth");
Route::get("dashboard/editproduct/deleteimage/{id}",[ProductimgController::class,'destroy'])->name("deleteimages")->middleware("auth");

//addcategory

Route::get("/dashboard/category",[CategoryController::class,'index'])->name('category')->middleware("auth");
Route::post("dashboard/savecat",[CategoryController::class,'store'])->name('savecat')->middleware("auth");
Route::post("dashboard/upcat/{id}",[CategoryController::class,'update'])->name('upcat')->middleware("auth");
Route::delete("dashboard/deletecat/{id}",[CategoryController::class,'destroy'])->name('deletecat')->middleware("auth");
Route::get("/dashboard/getsubcat/{id}",[SubcategoryController::class,'show'])->middleware("auth")->name('getsubcat');
Route::delete("/dashboard/deletesubcat/{id}",[SubcategoryController::class,'destroy'])->middleware("auth")->name('getsubcat');
Route::post("/dashboard/savesubcatinfo",[SubcategoryController::class,'Store'])->middleware("auth")->name("storesubcat");
Route::get("dashboard/getcats/{val}",[CategoryController::class,'show'])->name('showcats')->middleware("auth");


