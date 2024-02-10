<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\InstitutionController;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\AssetController;
use \App\Http\Controllers\AssetCategoryController;
use \App\Http\Controllers\DepartmentController;






// Redirect to login if the user visits /
Route::get("/", function () {
    return redirect()->to("login");
});

Auth::routes(["register"=>false]);


Route::middleware("auth")->group(function(){
    Route::view("dashboard","dashboard")->name("dashboard");
    Route::resource("institutions",InstitutionController::class);
    Route::resource("users",UserController::class);
    Route::resource("assets",AssetController::class);
    Route::resource("assetcategories",AssetCategoryController::class);
    Route::resource("departments",DepartmentController::class);


});
