
<!-- 
  resources/views/show.blade.php

-->

@extends("layouts.default")

@section("title", "アップロード画像の表示")

@section("content")
  <!-- セッションからメッセージを取得、表示 -->
  @if(session()->has("success"))
    <p>{{ session()->get("success") }}</p>
  @endif

  <!-- 
      /public/storage/photos の publicフォルダから画像を見れるようにする
      ※ 現在画像を保存してる、storage/public/photosはブラウザから見れないので、
        /publicフォルダにシンボリックリンク(ショートカットのようなもの)を作る
      → php artisan storage:link
      → /public/storage/photos が作られて画像が見れるようになる。
      → 
  -->
  <img src="{{ asset('storage/photos/' . $filename) }}" alt="">

  <form 
    action="{{ route('photos.destroy', ['photo' => $filename]) }}"
    method="POST"
  >
    @csrf
    @method("DELETE")

    <button type="submit">削除</button>
  </form>

  <a href="{{ route('photos.download', ['photo' => $filename]) }}">ダウンロード</a>


@endsection




