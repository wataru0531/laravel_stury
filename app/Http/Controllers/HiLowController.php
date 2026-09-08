<?php

// HiLowController

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HiLowController extends Controller {

    // 1から12までのカードをランダムで選び、viewで表示
    public function index() {
      $dealersNumber = random_int(1, 12);

      // セッションに保存。リロードするたびに新しいセッションが登録される
      session(["dealersNumber" => $dealersNumber]);

      return view('hi-low.index', ['dealersNumber' => $dealersNumber]);
    }

    // 
    public function result(Request $request) {
      // ディーラーの数字(hidden値で送信されたもの)を取得
      // $dealersNumber = $request->input('dealersNumber');

      // ディーラーの数字をセッションから取得
      $dealersNumber = session()->get("dealersNumber");

      // プレイヤーの数字を1~12の中からランダムに取得
      // プレイヤー = 自分自身
      $playersNumber = random_int(1, 12);

      // プレーヤーの数字がディーラーのものより大きいか判定(大きい場合にtrue)
      $isHigh = $playersNumber > $dealersNumber;

      // 予想が当たったかの判定
      // A || B  →  AまたはBが成立すれば正解
      // buttonは2つあるが、押した方のみしか取得できない。
      $isCorrect = ($isHigh && $request->input('guess') === 'high') || (!$isHigh && $request->input('guess') === 'low');
      
      // Viewで表示。views/hi-low/result.blade.php で表示。
      return view('hi-low.result', [
        'dealersNumber' => $dealersNumber,
        'playersNumber' => $playersNumber,
        'isCorrect' => $isCorrect,
      ]);
    }
}
