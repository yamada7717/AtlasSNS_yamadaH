@extends('layouts.login')

@section('content')
<div class="container">
  <div class="">
    <div class="">
      <div class="">
        @if(!empty($user->images))
        <div class="">{{$user->images}}</div>
        @endif
        <div class="">
          <form action="/updateProfile" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- id 名前 -->
            <input type="hidden" name="id" value="{{  $user->id }}" />
            <label for="username">user&nbsp;name</label>
            <input type="text" id="username" name="username" value="{{ $user->username }}" />
            <!-- メール -->
            <label for="mail">mail&nbsp;address</label>
            <input type="text" id="mail" name="mail" value="{{ $user->mail }}" />
            <!-- パスワード -->
            <label for="password">password&nbsp;</label>
            <input type="password" id="password" name="password" value="password" />
            <!--パスワード確認 -->
            <label for="password_confirm">password&nbsp;</label>
            <input type="password" id="password_confirm" name="password_confirm" value="password" /><br>
            <!-- 自己紹介 -->
            <label for="bio">bio</label>
            <textarea id="bio" name="bio" value="{{ $user->bio  }}" class=""></textarea>
            <!-- アイコン -->
            <label for="image">icon&nbsp;image</label>
            <input type="image" id="image" name="image" value="ファイルを選択" class="icon_select" /><br>
            <input type="submit" value="更新" />
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection