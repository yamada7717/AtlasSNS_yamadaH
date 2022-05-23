@extends('layouts.login')

@section('content')
<!-- 投稿エリア -->
<form action="{{ url('/create') }}" method="POST">
  @csrf
  <div class="form_img">
    <img src="images/icon1.png" alt="">
  </div>
  <div class="login_username">
  </div>
  <div class="form_grope">
    <input type=" text" name="post_tweet" placeholder="投稿内容を入れてください">
    <input type="image" src="images/post.png" alt="送信する" name="post_tweet" class="form_post-img">
  </div>
</form>
<!-- つぶやきの表示 -->
@if(session('message'))
<div class="alert alert-success">{{session('message')}}</div>
@endif
<div class="">
  <table class='table table-hover'>
    @foreach($posts as $post)
    <tr>
      <td>名前：{{ $post->user->username }}&nbsp;</td>
      <td>投稿内容：{{ $post->post }}</td>
      <td>{{ $post->created_at }}</td>
      <!-- ログインユーザーのみ編集、削除ボタン表示 -->
      @if(Auth::user()->id == $post->user_id)
      <td><a class="btn btn-primary" href="/post/{{$post->id}}/update-form">更新</a></td>
      <td><a class="btn btn-danger" href="/post/{{$post->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')"><img src="images/trash-h.png" alt="消去"></a></td>
      @endif
    </tr>
    @endforeach
  </table>
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

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><img src="images/edit.png" alt=""></button>
      </div>
    </div>
  </div>
</div>
@endsection