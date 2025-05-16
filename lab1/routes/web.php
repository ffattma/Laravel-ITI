<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/test',function () {
    return view('test');
});


// get all posts
Route::get('/posts', function() {
    $posts= [
        ['id' => 1,
        'title' => 'title 1',
        'body' => "post Body",
        'created_by' => "Aya"],

        ['id' => 2,
        'title' => 'title 2',
        'body' => "post Body",
        'created_by' => "Shery"],

        ['id' => 3,
        'title' => 'title 3',
        'body' => "post Body",
        'created_by' => "Eman"],

        ['id' => 4,
        'title' => 'title 4',
        'body' => "post Body",
        'created_by' => "Menna"],

    ];

   return view ("posts.index", ["posts" => $posts]);
});


// get by id
Route::get('/posts/{id}', function($id) {
    $posts= [
        'id' => $id,
        'title' => 'title 1',
        'body' => "post Body",
        'created_by' => "Ahmed"

    ];

   return view ("posts.view", ["post" => $posts]);
})->where('id', '[0-9]+');

// edit
Route::get('/posts/{id}/edit', function ($id) {
    $posts= [
        'id' => $id,
        'title' => 'title 1',
        'body' => "post Body",
        'created_by' => "Ahmed"

    ];
    return view("posts.edit", ["post" => $posts]);
})->where('id', '[0-9]+');


// delete
Route::get('/posts/{id}/delete', function($id) {
    return view("posts.delete", ['id' => $id]);
 });


// create
Route::get('/posts/create', function () {
    return view("posts.create");
});

// submit
Route::post('/posts', function () {
    return  "Done";
});