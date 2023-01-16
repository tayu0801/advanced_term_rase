<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/css/reset.css" />
    <link rel="stylesheet" href="/css/style.css" />
    <title>@yield('title')</title>
    <style>
      body {
          margin: 5px;
          font-size: 16px;
      }
      h1 {
          margin-left: 10px;
          color: white;
          font-size: 60px;
          letter-spacing: -4px;
          text-shadow: 1px 0 5px #289adc;
      }
      .content {
          margin: 10px;
      }
    </style>
  </head>
  <body>
    <h1>1111111111111111</h1>
    <div class="content">@yield('content')</div>
  </body>
</html>
