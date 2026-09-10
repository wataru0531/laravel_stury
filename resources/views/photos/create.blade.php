
@extends("layouts.default")

@section("title", "画像アップロード")


@section("content")
  <!-- フラッシュメッセージ -->
  @if(session()->has("success"))
    <p>{{ session()->get("success") }}</p>
  @endif

  <form 
    action="{{ route('photos.store') }}" 
    method="POST"
    enctype="multipart/form-data"
  >
    @csrf
    <div>
      <label for="image-label">画像: </label>
      <input 
        type="file" 
        id="image-label" 
        name="image"
      >
    </div>

    <button type="submit">アップロード</button>

  </form>
@endsection