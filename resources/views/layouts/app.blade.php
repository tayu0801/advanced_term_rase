<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/css/reset.css" />
    @if(app('env') == 'production')
    <link href="{{ secure_asset('css/style.css') }}" rel="stylesheet" />
    @else
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    @endif
    <title>Rese</title>
  </head>
  <body>
    <header class="header">
      <div class="header__area">
        <div class="header__area2">
          <div class="nav-area">
            <nav class="nav" id="nav">
              @auth
              <ul class="nav__menu">
                <li>
                  <a href="/">
                    <span class="menu-title">Home</span>
                  </a>
                </li>
                <li>
                  <form action="/logout" method="post">
                    @csrf
                    <input type="submit" class="menu-title" value="Logout" />
                  </form>
                </li>
                <li>
                  <a href="/mypage">
                    <span class="menu-title">Mypage</span>
                  </a>
                </li>
              </ul>
              @endauth @guest
              <ul class="nav__menu">
                <li>
                  <a href="/">
                    <span class="menu-title">Home</span>
                  </a>
                </li>
                <li>
                  <a href="/register">
                    <span class="menu-title">Registration</span>
                  </a>
                </li>
                <li>
                  <a href="/login">
                    <span class="menu-title">Login</span>
                  </a>
                </li>
              </ul>
              @endguest
              <div class="nonScroll"></div>
            </nav>
            <div class="menu" id="menu">
              <span class="menu__line--top"></span>
              <span class="menu__line--middle"></span>
              <span class="menu__line--bottom"></span>
            </div>
          </div>
          <a href="/">
            <h2 class="logo">Rese</h2>
          </a>
        </div>
        @yield('header')
      </div>
    </header>
    @yield('content')
    <script src="{{ asset('/js/main.js') }}"></script>
  </body>
</html>
