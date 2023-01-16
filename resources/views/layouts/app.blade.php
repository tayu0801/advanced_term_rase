<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/css/reset.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  @if(app('env') == 'production')
    <link href="{{ secure_asset('css/style.css') }}" rel="stylesheet">
  @else
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  @endif
  <title>Rese</title>
</head>
<body>
@yield('header')
      <div class="header__nav">
        <nav class="nav" id="nav">
          @auth
          <ul class="drawer">
            <li><a href="/"><span class="drawer">HOME</span></a></li>
            <li><form action="/logout" method="post">
              @csrf
              <input type="submit" class="drawer__logout" value="LOGOUT">
            </form>
            </li>
            <li><a href="/mypage"><span class="drawer">MYPAGE</span></a></li>
          </ul>
          @endauth
          @guest
          <ul class="drawer">
            <li><a href="/"><span class="drawer">HOME</span></a></li>
            <li><a href="/register"><span class="drawer">REGISTRATION</span></a></li>
            <li><a href="/login"><span class="drawer">LOGIN</span></a></li>
          </ul>
          @endguest
        </nav>
        <div class="menu" id="menu">
          <span class="menu__line--top"></span>
          <span class="menu__line--middle"></span>
          <span class="menu__line--bottom"></span>
        </div>
      </div>
      <a href="/"><h2 class="logo">Rese</h2></a>
    </div>
@yield('content')
  <script src="{{ asset('/js/main.js') }}"></script>
</body>
</html>
