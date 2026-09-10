<?php

// Http/Controller/PhotoController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller {
  // アップロード画面
  public function create() {
    return view("photos.create");
  }

  // アップロード処理
  public function store(Request $request) {
    // dd([
    //     'hasFile' => $request->hasFile('image'),
    //     'file' => $request->file('image'),
    //     'error' => $request->file('image')?->getError(),
    //     'errorMessage' => $request->file('image')?->getErrorMessage(),
    //     'path' => $request->file('image')?->getPathname(),
    //     'exists' => $request->file('image')
    //         ? file_exists($request->file('image')->getPathname())
    //         : false,
    // ]);

    // /storage/app/public/photos/ に保存。photosディレクトリは新たに作成
    $savedFilePath = $request->file("image")->store("photos", "public");
    Log::debug($savedFilePath); // Laravelのログファイルに記録。storage/logs/laravel.log

    // dd($savedFilePath); // "photos/nNepRpNOcRZr88SRkzsJqxfMxEiViozOeh1i3TZ2.avif" // app/Http/Controllers/PhotoController.php:33
    $filename = pathinfo($savedFilePath, PATHINFO_BASENAME); // ファイル名のみ取得
    // dd($filename); // "yFxpYDitaiycl9AhgCvGm40UMBrEKdqR816CvPYK.avif"

    // アップロード画面にリダイレクト
    // with() ... リダイレクト先に一時的なメッセージを渡す。sessionに
    return to_route("photos.show", [
      "photo" => $filename
    ])->with("success", "アップロード完了しました。");
  }

  // 画像表示画面
  public function show($filename) {
    return view("photos.show", ["filename" => $filename]);
  }

  // 画像を削除
  public function destroy($filename) {
    Storage::disk("public")->delete("photos/" . $filename);
    // → storage/photos/ の画像を削除する。参照元を削除

    // セッションにメッセージを残してリダイレクト
    return to_route("photos.create")->with("success", "削除しました。");
  }

  // ファイルをダウンロード
  public function download($filename) {
    // download(パス、保存するときのファイル名)
    return Storage::disk("public")->download("photos/" . $filename, $filename);
  }



}
