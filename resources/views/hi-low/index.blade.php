
<!-- 
  views/hi-low/index.blade.php

-->

@extends('layouts.default')

@section('title', 'ハイアンドロー')

@section('content')
  <!-- HiLowControllerのindex()で1から12の数値をランダムに渡す -->
  <p>ディーラのカードは...『{{ $dealersNumber }}』</p>

  <form method="POST" action="{{ route('hi-low') }}">
    @csrf

    <!-- 相手の数字はhiddenで、隠しパラメータとして送信 -->
    <!-- <input type="hidden" name="dealersNumber" value="{{ $dealersNumber }}" /> -->

    <!-- 2つの予測ボタン -->
    <button type="submit" name="guess" value="high">自分のカードが大きい</button>
    <button type="submit" name="guess" value="low">自分のカードが同じか小さい</button>
  </form>
@endsection