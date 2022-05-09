<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <!--IEブラウザ対策-->
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="ページの内容を表す文章" />
  <title></title>
  <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
  <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
  <!--スマホ,タブレット対応-->
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <!--サイトのアイコン指定-->
  <link rel="icon" href="画像URL" sizes=" 16x16" type="image/png" />
  <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
  <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
  <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
  <!--iphoneのアプリアイコン指定-->
  <link rel="apple-touch-icon-precomposed" href="画像のURL" />
  <!--OGPタグ/twitterカード-->
  <!--jQery 読み込み -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
  <header>
    <div class="header_inner">
      <div class="header_list">
        <div class="header_item">
          <a href="/top"><img src="images/atlas.png" class="header_item_img"></a>
        </div>
        <div class="header_nav_list">
          <div class="header_nav_item">
            <div class="header_nav_user">
              {{Auth::user()->username}}&nbsp;さん
            </div>
          </div>
          <div class="header_nav_item">
            <ul class="ac">
              <div class="ac-label">
                <div class="icon-wrap"><span class="icon"></span></div>
              </div>
              <div class="ac-content">
                <div class="ac_content_item">
                  <li><a href="/top" class="ac_item_link home">HOME</a></li>
                  <li class="profile"><a href="/profile" class="ac_item_link profile">プロフィール編集</a></li>
                  <li><a href="/logout" class="ac_item_link logout">ログアウト</a></li>
                </div>
              </div>
            </ul>
          </div>
          <div class="header_nav_item">
            <img src="images/arrow.png">
          </div>
        </div>
      </div>
    </div>
  </header>
  <div class="content_wrapper">
    <div>
      @yield('content')
    </div>
    <div id="side-bar" class="side_bar_item">
      <div id="confirm">
        <p>{{Auth::user()->username}}さんの</p>
        <div>
          <p>フォロー数</p>
          <p>〇〇名</p>
        </div>
        <p class="btn"><a href="">フォローリスト</a></p>
        <div>
          <p>フォロワー数</p>
          <p>〇〇名</p>
        </div>
        <p class="btn"><a href="">フォロワーリスト</a></p>
      </div>
      <p class="btn"><a href="">ユーザー検索</a></p>
    </div>
  </div>
  <!-- つぶやきの表示 -->
  <div class="">
    {{$list}}
  </div>
  <footer>
  </footer>
  <!--jQery 読み込み -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
  <script>
  $(function() {
    $('.ac-label').click(function() {
      $(this).next('div').slideToggle();
      $(this).find(".icon").toggleClass('open');
    });
  });
  </script>
  <script src="JavaScriptファイルのURL"></script>
</body>
</html>