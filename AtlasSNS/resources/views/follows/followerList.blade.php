@extends('layouts.login')

@section('content')
<div class="follower_inner">
  <div class="follower_content">
    <div class="follower_title">
      <h2 class="title">Follower&nbsp;List</h2>
    </div>
    <div class="follower_user">
      <p>ユーザー写真を横並びに配置し、写真にリンクを貼る</p>
    </div>
  </div>
  <div class="follow_list">
    <table class='table table-hover'>
      @foreach($posts as $post)
      <tr>
        <td>画像：{{ $post->user->images }}&nbsp;</td>
        <td>名前：{{ $post->user->username }}&nbsp;</td>
        <td>投稿内容：{{ $post->post }}</td>
        <td>{{ $post->created_at }}</td>
      </tr>
      @endforeach
    </table>
  </div>
</div>
@endsection