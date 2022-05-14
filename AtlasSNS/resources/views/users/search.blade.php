@extends('layouts.login')

@section('content')
<div class="search_inner">
  <div class="search_content">
    <div class="search_form">
      <form action="">
        <input type="text" placeholder="ユーザー名">
        <a href="search_link">サーチアイコン</a>
        <p>サーチアイコンクリック後、サーチ結果のページに遷移する</p>
      </form>
    </div>
    <div class="search_user">
      <p>登録済みユーザーを一覧表示させる</p>
      <p>ユーザー写真</p>
      <p>ユーザーネーム</p>
      <p>フォローボタン</p>
    </div>
  </div>
</div>
@endsection