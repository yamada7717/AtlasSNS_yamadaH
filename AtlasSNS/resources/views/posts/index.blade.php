@extends('layouts.login')

<!-- トップページ -->

@section('content')
<!-- 投稿エリア -->
<form action="{{ url('/create') }}" method="POST">
  @csrf
  <img class="form_icon" src="{{ asset('images/' .  Auth::user()->images) }}" alt="ユーザーアイコン">&nbsp;
  <input class="form_text" type="text" name="post_tweet" placeholder="投稿内容を入れてください">
  <input class="form_button" type="image" src="images/post.png" alt="送信する" name="post_tweet">
</form>
@if(session('message'))
<div class="alert alert-success">{{session('message')}}</div>
@endif
@if(session('newProfile'))
<div class="alert alert-success">{{session('newProfile')}}</div>
@endif
<!-- つぶやきの表示 -->
<section class="">
  @foreach($posts as $post)
  <div class="post">
    <div class="flex post_look">
      <img src="{{ asset('images/' .  $post->user->images) }}" class="user_img">
      <h2 class="post_user">{{$post->user->username}}</h2>
      <p class="post_date">{{$post->created_at}}</p>
    </div>
  </div>
  <div class="flex contents">
    <p class="post_text">{{$post->post}}</p>
    @if(Auth::user()->id == $post->user_id)
    <div class="contents">
      <a class="js-modal-open post_edit" href="/edit/{{$post->id}}" post_id="{{$post->id}}" post="{{$post->post}}">
        <img src="images/edit.png" alt="編集ボタン" class="edit_img">
      </a>
      <a class="post_delete" href="/post/{{$post->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">
        <img src="images/trash-h.png" alt="消去" class="delete_img">
      </a>
    </div>
    @endif
  </div>
  @endforeach
</section>
<!-- モーダルの中身 -->
<div class="modal js-modal">
  <div class="modal__bg js-modal-close"></div>
  <div class="modal__content">
    <!-- action属性に指定なしの場合は送信先はフォーム自身のhtmlファイル -->
    <form action="{{ url('/update/{id}') }}" method="POST">
      @csrf
      <textarea name="upPost" class="modal_post"></textarea>
      <input type="hidden" name='id' class="modal_id">
      <input type="image" src="images/edit.png" alt="更新する" name="upPost" class="modal_edit">
    </form>
    <a class="js-modal-close" href=""></a>
  </div>
</div>
</div>

<script>
$(function() {
  // 編集ボタン(class="js-modal-open")が押されたら発火
  $('.js-modal-open').on('click', function() {
    // モーダルの中身(class="js-modal")の表示
    $('.js-modal').fadeIn();
    // 押されたボタンから投稿内容を取得し変数へ格納
    var post = $(this).attr('post');
    // 押されたボタンから投稿のidを取得し変数へ格納（どの投稿を編集するか特定するのに必要な為）
    var post_id = $(this).attr('post_id');

    // 取得した投稿内容をモーダルの中身へ渡す
    $('.modal_post').text(post);
    // 取得した投稿のidをモーダルの中身へ渡す
    $('.modal_id').val(post_id);
    return false;
  });

  // 背景部分や閉じるボタン(js-modal-close)が押されたら発火
  $('.js-modal-close').on('click', function() {
    // モーダルの中身(class="js-modal")を非表示
    $('.js-modal').fadeOut();
    return false;
  });
});
</script>
@endsection