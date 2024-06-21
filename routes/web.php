<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('home', ['title' => 'Halaman Home']);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About']);
});


// Halaman Blog
Route::get('/posts', function () {
    // $posts = Post::with(['author', 'category'])->get();
    $posts = Post::latest()->get();
    return view('posts', ['title' => 'Halaman Blog', 'posts' => $posts]);
})->name('all-posts');

// Halaman Post detail
Route::get('posts/{post:slug}', function (Post $post) {

    // $post = Post::findPost($slug);

    return view('post-detail', ['title' => 'Artikel Detail' ,'post' => $post]);
})->name('post-detail');


// Halaman Konak
Route::get('/contact', function () {
    $contacts = ['email' => 'muhammadqolby701@gmail.com', 'hp' => '081345336291'];

    return view('contact', ['contacts' => $contacts, 'title' => 'Contact']);
});

// Posts author
Route::get('author/{user:username}', function (User $user) {
    // $posts = Post::select()->where('author_id', $id)->get();
    // $posts = $user->posts->load(['author', 'category']);
    return view('posts', ['title' => count($user->posts).' Articles by '.$user->name ,'posts' => $user->posts]);
})->name('author.posts');

// Posts Category
Route::get('category/{category:slug}', function (Category $category) {
    // $posts = Post::select()->where('author_id', $id)->get();
    // $posts = $category->posts->load(['author', 'category']);
    return view('posts', ['title' => count($category->posts).' In '.$category->name ,'posts' => $category->posts]);
})->name('category.posts');