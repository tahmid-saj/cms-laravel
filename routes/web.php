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

Route::get("/findmore", function() {
    // $posts = Post::findOrFail(1);

    // return $posts;

    $posts = Post::where("users_count", '<', 50)->findOrFail();

    return $posts;
});

Route::get("/basicinsert", function() {
    $post = new Post;

    $post->title = 'new Eloquent title insert';
    $post->content = 'eloquent content';

    $post->save();
});

Route::get("/basicinsertfind", function() {
    $post = Post::find(2);

    $post->title = 'new Eloquent title insert 2';
    $post->content = 'eloquent content 2';

    $post->save();
});

Route::get("/create", function() {
    Post::create(["title"=>'the create method', 'content'=>'php']);
});

Route::get("/updatewhere", function() {
    Post::where('id', 2)
        ->where("is_admin", 0)
        ->update(['title'=>'new php title', 'content'=>'php content']);
});

Route::get("/deletefind", function() {
    $post = Post::find(7);
    $post->delete();
});

Route::get("/delete2", function() {
    Post::destroy([4, 5]);

    // Post::where("is_admin", 0)->delete();
});

Route::get("/softdelete", function() {
    Post::find(4)->delete();
});

Route::get("/readsoftdelete", function() {
    // $post = Post::find(4);

    // return $post;

    $post = Post::withTrashed()->where("id", 4)->get();

    return $post;
});

Route::get("/restore", function() {
    Route::withThrashed()->where("is_admin", 4)->restore();

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
