@extends('layouts.default') @section('content')

<div class="mypage">
  <header class="header">
    <div class="header__title">Rese</div>
    <p class="header__user">{{$user->name}}さん</p>
  </header>
  <body class="body">
    <div class="mypage__reserve">
      @foreach ($reservations as $reservation)
      <div class="mypage__reserve_card">
        <div class="mypage-reservecard-title">予約</div>
        <div class="mypage-check__col1">
          <h3 class="mypage-check__title">Shop</h3>
          <h3 class="mypage-check__title">Date</h3>
          <h3 class="mypage-check__title">Time</h3>
          <h3 class="mypage-check__title">Number</h3>
        </div>
        <div class="mypage-check__col2">
          <h3 class="mypage-check__val">{{ $reservation["name"] }}</h3>
          <h3 class="mypage-check__val" id="text_time"></h3>
          <h3 class="mypage-check__val" id="text_date"></h3>
          <h3 class="mypage-check__val" id="text_number"></h3>
        </div>
      </div>
      @endforeach
    </div>
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
