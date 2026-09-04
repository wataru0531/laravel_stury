<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// アロー関数
// Route::get("/hello-world", fn() => "Hello World!" );

Route::get("hello-world", function() {
  return view("hello_world");
});


