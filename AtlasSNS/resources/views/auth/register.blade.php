@extends('layouts.logout')

@section('content')

{!! Form::open(['url' => '/register']) !!}
<div class="register_content">
  <h2 class="title">新規ユーザー登録</h2>
  <div class="login_title">
    <label>user name</label>
  </div>
  {{ Form::text('username',null,['class' => 'username']) }}
  <div class="login_title">
    <label>mail address</label>
  </div>
  {{ Form::text('mail',null,['class' => 'mail']) }}
  <div class="login_title">
    <label>password</label>
  </div>
  <div class="password">
    {{ Form::password('password',['class' => 'password']) }}
  </div>
  <div class="login_title">
    <label>password confirm</label>
  </div>
  <div class="password">
    {{ Form::password('password_confirmation',['class' => 'password']) }}
  </div>
  {{ Form::submit('REGISTER',['class' => 'register_btn']) }}
  <!-- エラーメッセージ表示 -->
  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
</div>
@endif

<p class="login_link"><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}


@endsection