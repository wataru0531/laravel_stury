
<!-- 
  default.blade.php → サイト全体の骨組み

  index.blade.php → このページ固有の内容

  要は、index.blade.phpでは、default.blade.phpを基底に使って、
  そこに渡す変数をsectionで渡しているような感じ
-->

<!-- 
  ✅ @extend() 
  → layouts/default.blade.php を親レイアウトとして使いますという意味。

-->
@extends("layouts.default")

<!-- 
  ✅ section() ... 区画、部分、セクション
  → ここでは、titleという名のセクションに、"さあ、はじめよう" を設定

  → default.blade.phpで、yield("title") 
    で、ここにそのtitleの内容を出力する
  
  ※ yield() ... 渡す、譲渡する、生み出す
-->
@section("title", "さあ、はじめよう")

<!-- コンテンツ部分に渡す内容を定義 -->
@section("content")
  <p>
    Laravelの学習をはじめての方をサポートする学習サイトです<br>
    このサイトでは、Laravelの基礎だけでなく開発環境構築やデータベースに関しても解説します<br>
    これから学習を始めるににあたり、まずは下記の内容をご確認下さい<br>
    ~~~~ 以下省略 ~~~~
  </p>
@endsection








