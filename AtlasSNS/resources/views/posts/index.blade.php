@extends('layouts.login')

@section('content')
<form action="{{ url('/create') }}" method="POST">
  @csrf
  <div class="form_img">
    <img src="images/icon1.png" alt="">
  </div>
  <div class="form_grope">
    <input type=" text" name="post_tweet" placeholder="投稿内容を入れてください">
    <input type="image" src="images/post.png" alt="送信する" name="post_tweet" class="form_post-img">
    <button type="submit" class="post_btn"><img src="images/post.png"></button>
  </div>
</form>
@endsection