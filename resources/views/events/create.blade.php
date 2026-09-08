


@extends("layouts.default")

@section("title", "イベント情報")

@section("content")
  <!-- 
    セッション
  -->
  @if(session()->has('success'))
    <p>{{ session()->get("success") }}</p>
  @endif

  <form action="{{ route('events.store') }}" method="post">
    @csrf
    <div>
      <label for="title">イベント名: </label>
      <input type="text" name="title">
    </div>

    <button type="submit">登録</button>
  </form>
@endsection