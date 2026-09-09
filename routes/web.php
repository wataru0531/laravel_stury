<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UtilityController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\RequestSampleController;

use App\Http\Controllers\EventController;

use App\Http\Controllers\HiLowController;
use App\Http\Controllers\PhotoController;

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

// ✅ リクエスト
Route::get("/form", [RequestSampleController::class, "form"]);
// リクエスト送信時の処理
Route::get("/query-strings", [RequestSampleController::class, "queryStrings"]);

// ✅ ユーザー個別ページ。idを受け取る
// http://127.0.0.1:8000/users/1 → 1をControllerで受け取る
// name() → 名前付きルート。/users/{id}のルートに名前をつける
Route::get("/users/{id}", [RequestSampleController::class, "profile"])->name("profile");

// ✅ 複数の値をControllerに渡す
// → http://127.0.0.1:8000/products/suv/2026
Route::get("/products/{category}/{year}", [RequestSampleController::class, "productsArchive"]);

// 
Route::get("/route-link", [RequestSampleController::class, "routeLink"]);

// ✅ ログイン
Route::get("/login", [RequestSampleController::class, "loginForm"]);

// ログインページから送信
Route::post("/login", [RequestSampleController::class, "login"])->name("login");

// ✅ よくつかう７つのアクションを一挙に登録
// → resource()で登録
Route::resource("/events", EventController::class)->only(["create", "store"]);

// ✅ ハイローゲーム
Route::get('/hi-low', [HiLowController::class, 'index'])->name('hi-low');
Route::post('/hi-low', [HiLowController::class, 'result']);

// ✅ ファイル管理
Route::resource("/photos", PhotoController::class)->only(["create", "store", "show"]);