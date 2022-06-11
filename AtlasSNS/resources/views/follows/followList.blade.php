@extends('layouts.login')

@section('content')
<div class="follow_inner">
  <div class="follow_content">
    <div class="follow_title">
      <h2 class="title">Follow&nbsp;List</h2>
    </div>
    <div class="follow_user">
      <p>ユーザー写真を横並びに配置し、写真にリンクを貼る</p>
    </div>
  </div>
  <div class="follow_list">
    <table class='table table-hover'>
      @foreach($posts as $post)
      <tr>
        <td>名前：{{ $post->user->images }}&nbsp;</td>
        <td>名前：{{ $post->user->username }}&nbsp;</td>
        <td>投稿内容：{{ $post->post }}</td>
        <td>{{ $post->created_at }}</td>
      </tr>
      @endforeach
    </table>
  </div>
</div>
@endsection