<?php

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


Route::get('adminLogin','Admin\login@index') ;
Route::post('adminLogin','Admin\login@login');

Route::namespace('Admin')->middleware('adminAuth')->prefix('admin')->group(function () {
    Route::get('index','index@index');
});
