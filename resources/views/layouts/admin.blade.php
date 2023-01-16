<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/css/reset.css"/>
  @if(app('env') == 'production')
    <link href="{{ secure_asset('css/style.css') }}" rel="stylesheet">
  @else
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  @endif
  <title>Rese</title>
</head>
<body>
  <header class="header-admin flex-item">
    <h2 class="logo">Rese</h2>
    <form action="/logout" method="post">
      @csrf 
      <input type="submit" class="admin-logout" value="LOGOUT">
    </form>
  </header>
@yield('content')   
  <script src="{{ asset('/js/rese.js') }}"></script>
</body>
</html>