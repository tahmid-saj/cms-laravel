<?php

use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\DB;

use App\Models\Post;


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
Route::get("/insert", function() {
    DB::insert("insert into posts(title, content) values(?, ?)", 
    ['PHP with Laravel 7', 'Laravel is the best thing that has happened']);
});

Route::get("/read", function() {
    $results = DB::select("select * from posts where id = ?", [1]);

    return var_dump($results);

    foreach($results as $post) {
        return $post->title;
    }
});

Route::get("/update", function() {
    $updated = DB::update("update posts set title = 'updated title' where id = ?", [1]);

    return $updated;
});

Route::get("/delete", function() {
    $deleted = DB::delete("delete from posts where id = ?", [1]);

    return $deleted;
});

// Eloquent / Object relational model - ORM
Route::get('/read', function() {
    $posts = Post::all();

    foreach ($posts as $post) {
        return $post->title;
    }
});

Route::get('/find', function() {
    $post = Post::find(2);

    return $post->title;
});

Route::get('/findWhere', function() {
    $posts = Post::where('id', 2)->orderBy('id', 'desc')->take(1)->get();

    return $posts;
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
