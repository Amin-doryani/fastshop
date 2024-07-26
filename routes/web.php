<?php
use App\Http\Controllers\AdminController;
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
