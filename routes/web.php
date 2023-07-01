<?php

use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\DB;

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

// Route::get("/post/{id}", "\App\Http\Controllers\PostsController@index");

Route::resource("posts", "\App\Http\Controllers\PostsController");

Route::get("/contact", "\App\Http\Controllers\PostsController@contact");

Route::get("/post/{id}/{name}/{password}", "\App\Http\Controllers\PostsController@show_post");

// Database raw SQL queries
// Route::get("/insert", function() {
//     DB::insert("insert into posts(title, content) values(?, ?)", 
//     ['PHP with Laravel', 'Laravel is the best thing that has happened']);
// });

// Route::get("/read", function() {
//     $results = DB::select("select * from posts where id = ?", [1]);

//     return var_dump($results);

//     foreach($results as $post) {
//         return $post->title;
//     }
// });

Route::get("/update", function() {
    $updated = DB::update("update posts set title = 'updated title' where id = ?", [1]);

    return $updated;
});

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

// Route::group(['middleware' => ['web']], function () {

// });
