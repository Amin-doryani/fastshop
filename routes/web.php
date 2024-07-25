<?php
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.login');
});
Route::get("/createnewadmin10", function(){
    return view("admin.createnewadmin");
});
Route::get('/admin-login',[AdminController::class,'show'])->name("adminlogin");
Route::post('/check-admin-login', [AdminController::class,'login'])->name("checkadminlogin");
Route::post('/storeadmin', [AdminController::class,'store'])->name("storeadmin");


Route::get("/dashboard",[AdminController::class,'index'])->name("dashboard");
