@extends('layouts.logout')

@section('content')
<div class="added_content">
  <p class="added_name">{{session('username')}}さん</p>
  <p class="added_Atlas"> ようこそ！AtlasSNSへ</p>
  <div class="added_title">
    <p class="added_item">ユーザー登録が完了しました。</p>
    <p class="added_item"> 早速ログインをしてみましょう!</p>
  </div>
  <div class="added_link">
    <a href="/login" class="added_btn">ログイン画面へ</a>
  </div>
</div>

@endsection