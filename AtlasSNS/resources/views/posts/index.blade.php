@extends('layouts.login')

@section('content')
<!-- 投稿エリア -->
<form action="{{ url('/create') }}" method="POST">
  @csrf
  <div class="form_img">
    <img src="{{asset('images/icon1.png')}}" alt="">
  </div>
  <div class="login_username">
  </div>
  <div class="form_grope">
    <input type="text" name="post_tweet" placeholder="投稿内容を入れてください">
    <input type="image" src="images/post.png" alt="送信する" name="post_tweet" class="form_post-img">
  </div>
</form>
<!-- つぶやきの表示 -->
@if(session('message'))
<div class="alert alert-success">{{session('message')}}</div>
@endif
@if(session('NewProfile'))
<div class="alert alert-success">{{session('newProfile')}}</div>
@endif
<div class="">
  <table class='table table-hover'>
    @foreach($posts as $post)
    <tr>
      <td>名前：{{ $post->user->images }}&nbsp;</td>
      <td>名前：{{ $post->user->username }}&nbsp;</td>
      <td>投稿内容：{{ $post->post }}</td>
      <td>{{ $post->created_at }}</td>
      <!-- ログインユーザーのみ編集、削除ボタン表示 -->
      @if(Auth::user()->id == $post->user_id)
      <div class="content">
        <td><a class="btn btn-primary js-modal-open" href="/edit/{{$post->id}}" post_id="{{$post->id}}" post="{{$post->post}}">更新</a></td>
        <td><a class="btn btn-danger" href="/post/{{$post->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')"><img src="images/trash-h.png" alt="消去"></a></td>
      </div>
      @endif
    </tr>
    @endforeach
  </table>
  <!-- モーダルの中身 -->
  <div class="modal js-modal">
    <div class="modal__bg js-modal-close"></div>
    <div class="modal__content">
      <!-- action属性に指定なしの場合は送信先はフォーム自身のhtmlファイル -->
      <form action="{{ url('/update/{id}') }}" method="POST">
        @csrf
        <textarea name="upPost" class="modal_post"></textarea>
        <input type="hidden" name='id' class="modal_id">
        <input type="image" src="images/edit.png" alt="更新する" name="upPost">
      </form>
      <a class="js-modal-close" href="">閉じる</a>
    </div>
  </div>
</div>
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