<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class UtilityController extends Controller {
  // ✅ アクションを設定していく
  public function worldTime() {
    $timeDiff = [
      '東京' => 0, // 0時間
      'シンガポール' => -1, // -1時間
      'パリ' => -8, // -8時間
      'ロンドン' => -9,
      'ニューヨーク' => -14,
      'ロサンゼルス' => -17,
      'ハワイ' => -19,
    ];

    // array_map(各要素に行う処理, 元の配列)
    // $diff → 連想配列の値(数値)
    // now() → 現在日時を取得
    // now()->addHours($diff) ... 現在日時に$diffを足した時間
    $times = array_map(fn($diff) => now()->addHours($diff), $timeDiff);
    return view('world-time', ['times' => $times]);
  }



}
