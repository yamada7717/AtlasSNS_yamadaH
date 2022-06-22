@extends('layouts.login')

@section('content')
<div class="search_inner">
  <div class="search_content">
    <div class="search_form">
      <form action="{{ url('/searchList')}}" method="GET">
        @csrf
        <input type="text" name="keyword" placeholder="ユーザー名">
        <button class="btn btn-info btn-lg" type="submit">
          <i class="fa-solid fa-magnifying-glass"></i>
        </button>
      </form>
    </div>
    <div class="search_user">
      <div class="search_keyword">
        @if(!empty($keyword))
        <div class="search_list">
          検索ワード：{{ $keyword }}
        </div>
        @endif
      </div>
      <div class="">
        @foreach($users as $user)
        <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="">
              <div class="">
                @if(Auth::user()->id != $user->id)
                <div><img src="{{ asset('images/' .  $user->images) }}">&nbsp;</div>
                <div>名前：{{ $user->username }}&nbsp;</div>
                <img src="" class="rounded-circle">
                <div class="d-flex justify-content-end flex-grow-1">
                  @if(Auth::user()->isFollowing($user->id))
                  <form action="{{ url('/unFollow')}}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{$user->id}}">
                    <button type="submit" class="btn btn-danger">フォロー解除</button>
                  </form>
                  @else
                  <form action="{{ url('/follow')}}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{$user->id}}">
                    <button type="submit" class="btn btn-primary">フォローする</button>
                  </form>
                  @endif
                </div>
                @endif
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
@endsection