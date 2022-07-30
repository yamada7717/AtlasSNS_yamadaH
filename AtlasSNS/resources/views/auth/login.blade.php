@extends('layouts.logout')

@section('content')

{!! Form::open(['url' => '/login']) !!}
<div class="content">
  <div class="content_item">
    <p class="title">AtlasSNSへようこそ</p>
    {{Form::token()}}
    <div class="login_title">
      <label>mail address</label>
    </div>
    <div class="mail">
      {{ Form::text('mail',null,['class' => 'mail']) }}
    </div>
    <div class="login_title">
      <label>password</label>
    </div>
    <div class="password">
      {{ Form::password('password',['class' => 'password']) }}
    </div>
    {{ Form::submit('LOGIN',['class' => 'login_btn']) }}
    <p class="register_link"><a href="/register">新規ユーザーの方はこちら</a></p>
  </div>
  {!! Form::close() !!}

  @endsection