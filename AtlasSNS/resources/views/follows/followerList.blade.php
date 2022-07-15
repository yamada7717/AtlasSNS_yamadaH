@extends('layouts.login')

@section('content')
<div class="">
  <div class="content">
    <div class="follower_title">
      <h2 class="title">Follower&nbsp;List</h2>
    </div>
    <div class="follower_user">
      @foreach($users as $user)
      <a href="{{ route('/other-profile',[ 'id' => $user->id ])}}">
        <img src="{{ asset('images/' .  $user->images) }}" alt="ユーザーアイコンです">
      </a>
      @endforeach
    </div>
  </div>
  <div class="follower_list">
    @foreach($posts as $post)
    <div class="post">
      <div class="flex post_look">
        <img src="{{ asset('images/' .  $post->user->images) }}" class="user_img">
        <h2 class="post_user">{{$post->user->username}}</h2>
        <p class="post_date">{{$post->created_at}}</p>
      </div>
      <div class="flex contents">
        <p class="post_text">{{$post->post}}</p>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection