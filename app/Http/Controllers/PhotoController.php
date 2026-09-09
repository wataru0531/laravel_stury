<?php

// Http/Controller/PhotoController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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

    // /storage/app/public/photos/ に保存される。photosディレクトリは作成される
    $savedFilePath = $request->file("image")->store("photos", "public");
    Log::debug($savedFilePath); // 保存した場所をログに記憶する

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


}
