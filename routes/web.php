<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::controller(\App\Http\Controllers\PermissionController::class)->prefix('/permission')->group(function(){
    Route::get('/bind-permissions-to-role/show' , 'showBindPermissionToRole')->name('permission.bind');
    Route::get('/get-role-binded-permissions/' , 'getPermissionBindedToRole')->name('permission.getRolePermissions');
    Route::post('/bind-permission-to-role' , 'bindPermissionToRole')->name('permission.bindPermission');
});
Route::controller(\App\Http\Controllers\AnnouncementController::class)->prefix('/announcement')->group(function(){
    Route::get('/historical','historical')->name('announcement.historical');
});


Route::resource('/announcement', \App\Http\Controllers\AnnouncementController::class);
Route::resource('/permission' , \App\Http\Controllers\PermissionController::class);
Route::resource('/role' , \App\Http\Controllers\RoleController::class);
Route::resource('/user' , \App\Http\Controllers\UserController::class);

