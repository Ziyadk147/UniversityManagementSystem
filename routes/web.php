<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('/permission' , \App\Http\Controllers\PermissionController::class);
Route::resource('/role' , \App\Http\Controllers\RoleController::class);
