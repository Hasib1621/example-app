<?php

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;

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
    return view('welcome', [
        'posts' => Post::all()
    ]);
    // $files = File::files(resource_path("posts"));
    // $posts = array_map(function ($f) {
    //     $document = YamlFrontMatter::parseFile($f);
    //     return
    //         new Post(
    //             $document->title,
    //             $document->excerpt,
    //             $document->date,
    //             $document->body(),
    //             $document->slug
    //         );
    // }, $files);

    // foreach ($files as  $file) {
    //     $document = YamlFrontMatter::parseFile($file);
    //     $posts[] = new Post($document->title, $document->excerpt, $document->date, $document->body(), $document->slug);
    // }

    // $document = YamlFrontMatter::parseFile(resource_path('posts/my_fourth.html'));
    // ddd($document->date);

});

Route::get('posts/{post:slug}', function (Post $post) {
    return view('post', [
        'post' => $post
    ]);
});

// Route::get('posts/{post}', function ($slug) {
//     //$path = __DIR__ . "/../resources/posts/{$slug}.html";
//     //ddd($path);
//     if (!file_exists($path = __DIR__ . "/../resources/posts/{$slug}.html")) {
//         // abort(404);
//         return redirect('/');
//     }
//     $post = cache()->remember("posts.{$slug}", now()->addMinutes(20), fn () => file_get_contents($path));
//     return view('post', [
//         'post' => $post
//     ]);
// })->where('post', '[A-z_-]+');
Route::get('categories/{category:slug}', function (Category $category) {
    return view('welcome', [
        'posts' => $category->posts
    ]);
});
