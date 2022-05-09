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
  </div>
</form>
<!-- つぶやきの表示 -->
<div class="">
  <table class='table table-hover'>
    <tr>
      <th>投稿No</th>
      <th>投稿内容</th>
      <th>投稿日時</th>
    </tr>
    @foreach($lists as $list)
    <tr>
      <td>{{ $list->id }}</td>
      <td>{{ $list->post }}</td>
      <td>{{ $list->created_at }}</td>
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
@endsection