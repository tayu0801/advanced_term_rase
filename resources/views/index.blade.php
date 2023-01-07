@extends('layouts.default') @section('content')
<p class="todo__login-user">「{{$user->name}}」でログイン中</p>

<div class="shop">
  <header class="header">
    <div class="header__title">Rese</div>
    <div class="header__search">
      <form action="/search" method="get">
        @csrf
        <div class="header__search__area">
          <select name="input_area">
            <option value="0">All area</option>
            @foreach ($areas as $area)
            <option value="{{ $area->id }}">{{ $area->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="header__search__genre">
          <select name="input_genre">
            <option value="0">All genre</option>
            @foreach ($genres as $genre)
            <option value="{{ $genre->id }}">{{ $genre->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="header__search__shop">
          <input type="text" name="input_shop" value="" />
        </div>
          <button
            class="shop-favorite"
            type="submit"
            name="shop_id"
            value="1"
          >
      </form>
    </div>
  </header>
  <body class="body">
    @foreach ($shops as $shop)
    <div class="shop__card">
      <form method="post" action="{{ route('favorite') }}">
        @csrf
        <div class="shop__card__imagearea">
          <img src="{{ $shop['image_url'] }}" />
        </div>
        <div class="shop__card__textarea">
          <p class="shop-title">{{ $shop["name"] }}</p>
          <p class="shop-tag">
            @if (isset($shop["genre"]))
            {{ $shop["genre"]["name"] }}
            @endif
          </p>
          <a href="{{ route('show', ['id'=>$shop['id']]) }}" class="btn"
            >詳しくみる</a
          >
          <button
            class="shop-favorite"
            type="submit"
            name="shop_id"
            value="{{ $shop['id'] }}"
          >
            @if (isset($shop["favorite"])) ❤ @endif
          </button>
        </div>
      </form>
    </div>
    @endforeach
  </body>
</div>

@endsection
