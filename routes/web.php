<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get("/post/{id}", "\App\Http\Controllers\PostsController@index");

// Route::get('/about', function () {
//     return "Hi about page";
// });

// Route::get('/contact', function () {
//     return "Contact page";
// });

// Route::get("/post/{id}/{name}", function ($id, $name) {
//     return "This is post number " . $id . " $name";
// });

// Route::get('admin/posts/example', array('as' => 'admin.home', function () {
//     $url = route('admin.home');

//     return "This url is " . $url;
// }));

Route::group(['middleware' => ['web']], function () {

});
