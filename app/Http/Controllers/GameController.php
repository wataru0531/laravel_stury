<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController extends Controller {
  public function omikuji() {
    $fortunes = ['大吉', '中吉', '小吉', '吉', '末吉', '凶', '大凶'];
    $resultIndex = array_rand($fortunes); // ランダムなキーを選択
    $result = $fortunes[$resultIndex];
    return view('omikuji', ['result' => $result]);
  }

  public function montyHall() {
    $results = [];
    for ($i = 0; $i < 1000; $i++) { // 1000回ループ
      $options = [true, false, false]; // 当たり、はずれ、はずれ
      shuffle($options);

      // 3つのドアから最初に選ぶドアをランダムに決める
      $selectedIndex = array_rand($options); // ランダムにキーを選択

      // 選んだドアを除外して、残りのドアのインデックスを取得
      // ARRAY_FILTER_USE_KEY → 
      $notSelectedIndexes = array_filter($options, fn($index) => $index !== $selectedIndex, ARRAY_FILTER_USE_KEY);
      // falseが入っているインデックスを取得
      $removeIndex = array_search(false, $notSelectedIndexes); 
      // unset() → 指定した要素を配列から除外する
      unset($notSelectedIndexes[$removeIndex]);

      $changedIndex = key($notSelectedIndexes); // 残っているドアのインデックスを取得
      $results[] = $options[$changedIndex];
    }

    $wonCount = count(array_filter($results, fn($result) => $result));
    return view('monty-hall', ['results' => $results, 'wonCount' => $wonCount]);
  }
}
