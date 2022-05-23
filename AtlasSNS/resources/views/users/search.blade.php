@extends('layouts.login')

@section('content')
<div class="search_inner">
  <div class="search_content">
    <div class="search_form">
      <form action="{{ url('/search')}}" method="GET">
        @csrf
        <input type="text" name="keyword" value="{{$keyword}}" placeholder="ユーザー名">
        <button class="btn btn-info btn-lg" type="submit">
          <i class="fa-solid fa-magnifying-glass"></i>
        </button>
        <p>サーチアイコンクリック後、サーチ結果のページに遷移する</p>
      </form>
    </div>
    <div class="search_user">
      <p>登録済みの自分以外のユーザーを一覧表示させる</p>
      <p>ユーザー写真</p>
      <p>ユーザーネーム</p>
      <p>フォローボタン</p>
      @if(isset($search))
      @foreach($search as $list)
      <div>{{$list->username}}</div>
      @endforeach
      @endif
      <div class="">
        @foreach($users as $user)
        <!-- ログインユーザーのみ編集、削除ボタン表示 -->
        <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="">
              <div class="">
                <div>ユーザー画像：{{ $user->images }}&nbsp;</div>
                <div>名前：{{ $user->username }}&nbsp;</div>
                <img src="" class="rounded-circle">
                <div class="d-flex justify-content-end flex-grow-1">
                  <form action="" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-danger">フォロー解除</button>
                  </form>
                  <form action="{}" method="POST">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-primary">フォローする</button>
                  </form>
                </div>
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