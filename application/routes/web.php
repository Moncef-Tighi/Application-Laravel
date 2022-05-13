<?php

use Illuminate\Support\Facades\Route;

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
    return view('home.index');
})->name("home.index");

Route::get('/contact', function() {
    return view('home.contact');
})->name('home.contact');

Route::get('/posts/{id}', function($id) {
    return 'Blog Post : ' . $id;
})->name('Un Post');