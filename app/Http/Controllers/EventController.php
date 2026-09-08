<?php

// よくつかう7つのCRUD機能をまとめて記述
// web.phpから、
// Route::resource("/events", EventController::class)->only("index", "create");
// などと必要なアクションのみ取得する

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EventController extends Controller {

    // 動画表示画面
    public function create() {
      // 
      return view("events.create");
    }

    // 登録処理
    public function store(Request $request) {
      // 
      Log::debug("イベント名" . $request->input("title"));
      
      $title = $request->input("title");

      // http://127.0.0.1:8000/events/create にリダイレクト
      // with("キー", 値) でセッションから値を取得して表示
      return to_route("events.create")->with("success", $title . "を登録しました。");
    }

}
