<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UtilityController;
use App\Http\Controllers\GameController;

// Route::get('/', function () {
//   return view('welcome');
// });

// アロー関数
// Route::get("/hello-world", fn() => "Hello World!" );

Route::get("hello-world", function() {
  return view("hello_world");
});

Route::get("hello", function() {
  return view("hello", [
    "name" => "Wataru",
    "course" => "Laravel"
  ]);
});

Route::get("/", function() {
  return view("index");
});

Route::get("/curriculum", fn() => view("curriculum"));


// ✅ 世界の時間
// コントローラ名、アクション名を指定
Route::get("/world-time", [UtilityController::class, "worldTime"]);


// ✅ おみくじ
Route::get('/omikuji', [GameController::class, "omikuji"]);

// ✅ モンティ・ホール問題
// 「ドアを選び直すことで、当たりが出る確率が2倍（1/3から2/3）に上がる」という、
//  直感と論理が食い違う有名な確率論の問題
Route::get('/monty-hall', [GameController::class, "montyHall"]);