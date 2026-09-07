<?php

// ✅ RequestSampleController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequestSampleController extends Controller {
  // アクションを定義していく
  public function form() {
    return view("form");
  }

  public function queryStrings(Request $request) {
    // $keyword = "未設定";

    // if($request->has("keyword")) {
    //   $keyword = $request->keyword;
    // }

    $keyword =  $request->input("keyword", "未設定");

    return "キーワードは、" . $keyword . "です。";
  }

  // http://127.0.0.1:8000/users/1 → idの1を受け取る
  public function profile($id) {
    return "ID: " . $id;
  }

  // ✅ 複数のパラメータを受け取る
  // http://127.0.0.1:8000/products/suv/2026
  public function productsArchive(Request $request, $category, $year) {
    return "category: " . $category . "<br>year: " . $year . "<br>page: " . $request->input("page", 1); 
  }

  // ✅ profile(名前つきルート)
  public function routeLink() {
    // 名前付きルートのprofile(/users/{id})で、urlを作る
    // route() → ルート名からURLを作ってくれるLaravelのヘルパー関数
    $url = route("profile", [
      "id" => 1,
      "photos" => "yes"
      // → photos=yes は、クエリパラメートとして付与する
    ]);

    return "プロフィールページのURLは、" . $url;
  }

  public function loginForm() {
    return view("login");
  }

  // 
  public function login(Request $request) {
    if($request->input("email") === "user@example.com" && $request->input("password") === "12345678") {
      return "ログイン成功";
    }

    return "ログイン失敗";
  }


}

