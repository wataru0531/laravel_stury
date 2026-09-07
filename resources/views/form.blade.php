

<!-- 
  デフォルトのlayouts.defaultファイルをつかう
-->
@extends("layouts.default")


@section("title", "さあ、はじめよう")

<!-- コンテンツ部分に渡す内容を定義 -->
@section("content")
  <form action="/query-strings" method="GET">
    <label for="keyword">キーワード</label>
    <input 
      id="keyword"
      type="text"
      name="keyword"

    >
    <button type="submit">送信</button>
  </form>
@endsection








