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

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin', function () {
    return view('layouts.admin');
});

Route::resource('admin/category','Admin\\CategoryController');

Route::resource('admin/author','Admin\\AuthorController');

Route::resource('admin/publishingcompany','Admin\\PublishingCompanyController');

Route::resource('admin/product','Admin\\ProductController');

Route::resource('admin/order','Admin\\OrderController');

Route::resource('admin/user','Admin\\UserController');