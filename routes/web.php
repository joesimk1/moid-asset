<?php

use App\Http\Controllers\AssetController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DepartmentController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\InstitutionController;
use \App\Http\Controllers\UserController;


// Redirect to login if the user visits /
Route::get("/", function () {
    return redirect()->to("login");
});

Auth::routes(["register" => false]);

// protect routes
Route::middleware("auth")->group(function () {
    Route::view("dashboard", "dashboard")->name("dashboard");
    Route::resource("institutions", InstitutionController::class);
    Route::resource("users", UserController::class);


    Route::resource('departments', DepartmentController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('assets', AssetController::class);
});




