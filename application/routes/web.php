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

Route::view('/', 'home.index')->name("home.index");
Route::view('/', 'home.contact')->name("home.contact");

$posts = [
    1=> [
        "title" => 'Into to Laravel',
        "content" => "This is a short intro to Laravel",
        "is_new" => true
    ],
    2=> [
        "title" => "Into to PhP",
        "content" => "This is a short intro to PHP",
        "is_new" => false
    ]
];
Route::get('/posts', function() use($posts) {
    return view('posts.liste', ["posts" => $posts]);
})->name('posts.liste');

Route::get('/posts/{id}', function($id) use($posts) {

    abort_if(!isset($posts[$id]), 404);

    return view('posts.show', ["post" => $posts[$id]]);
})->name('posts.show');



