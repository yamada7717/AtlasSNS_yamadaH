@extends('layouts.login')

<!-- プロフィール編集 -->

@section('content')
<div class="container">
  <div class="">
    <!-- エラーメッセージ表示 -->
    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
    <div class="">
      <div class="flex">
        <div>
          <img src="{{ asset('images/' .  Auth::user()->images) }}" alt="ユーザーアイコンです">
        </div>
        <div class="">
          <form action="/updateProfile" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- id 名前 -->
            <input type="hidden" name="id" value="{{  $users->id }}" />
            <label for="username">user&nbsp;name</label>
            <input type="text" id="username" name="username" value="{{ $users->username }}" />
            <!-- メール -->
            <label for="mail">mail&nbsp;address</label>
            <input type="text" id="mail" name="mail" value="{{ $users->mail }}" />
            <!-- パスワード -->
            <label for="password">password&nbsp;</label>
            <input type="password" id="password" name="password" value="" />
            <!--パスワード確認 -->
            <label for="password_confirm">password&nbsp;</label>
            <input type="password" id="password_confirm" name="password_confirmation" value="" /><br>
            <!-- 自己紹介 -->
            <label for="bio">bio</label>
            <input id="bio" name="bio" value="{{ $users->bio  }}" class="">
            <!-- アイコン -->
            <label for="images">icon&nbsp;image</label>
            <input type="file" id="images" name="images" value="ファイルを選択" class="icon_select" /><br>
            <input type="submit" value="更新" />
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection