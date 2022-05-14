<?php

use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
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

Route::get('/',[HomeController::class, "home"])->name("home.index");
Route::get('/contact', [HomeController::class, "contact"])->name("home.contact");

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

Route::prefix('/posts')->name('posts.')->group(function() use($posts){

    Route::get('/', function(Request $request) use($posts) {
        dd($request->query());
        return view('posts.liste', ["posts" => $posts]);
    })->name('liste');
    
    Route::get('/{id}', function($id) use($posts) {
    
        abort_if(!isset($posts[$id]), 404);
    
        return view('posts.show', ["post" => $posts[$id]]);
    })->name('show');
});

Route::get('/responses', function() use($posts){
    return response() 
    ->json($posts)
    ->cookie('COOKIE', 'Test', 3600);
})->name('responses');

