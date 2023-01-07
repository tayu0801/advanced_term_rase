@extends('layouts.default') @section('content')

<div class="desc">
  <header class="header">
    <div class="title">Rese</div>
  </header>
  <body class="body">
    <div class="desc__shopcard">
      <button
        class="send-button"
        type="button"
        onclick="location.href='{{ route('index') }}' "
      >
        ＜
      </button>
      <p class="desc__shopcard__shop">{{ $shop["name"] }}</p>
      <div class="desc__shopcard__imagearea">
        <img src="{{ $shop['image_url'] }}" />
      </div>
      <div class="shop__card__textarea">
        <p class="shop-tag">
          @if (isset($shop["genre"]))
          {{ $shop["genre"]["name"] }}
          @endif
        </p>
        <p class="shop-description">
          {{ $shop["description"] }}
        </p>
      </div>
    </div>
    <form method="post" action="{{ route('create') }}">
      @csrf
      <div class="desc__reservecard">
        <p class="desc__reserveard__title"></p>
        <div class="desc__reservecard__calender">
          <input type="date" id="pulldown_date" name="input_date" value="" />
        </div>
        <div class="desc__reservecard__start_time">
          <input type="time" id="pulldown_time" name="input_time" value="" />
        </div>
        <div class="desc__reservecard__number">
          <select id="pulldown_number" name="input_number">
            @for ($i = 0; $i < 5; $i++)
            <option value="{{ $i }}">{{ $i }}</option>
            @endfor
          </select>
        </div>
        <div class="desc__reservecard__check">
          <div class="desc-check__col1">
            <h3 class="desc-check__title">Shop</h3>
            <h3 class="desc-check__title">Date</h3>
            <h3 class="desc-check__title">Time</h3>
            <h3 class="desc-check__title">Number</h3>
          </div>
          <div class="desc-check__col2">
            <h3 class="desc-check__val">{{ $shop["name"] }}</h3>
            <h3 class="desc-check__val" id="text_time"></h3>
            <h3 class="desc-check__val" id="text_date"></h3>
            <h3 class="desc-check__val" id="text_number"></h3>
          </div>
        </div>
        <div class="button-area">
          <button
            class="send-button"
            type="submit"
            name="shop_id"
            value="{{ $shop['id'] }}"
          >
            予約する
          </button>
        </div>
      </div>
    </form>
  </body>
</div>
<script src="{{ asset('/js/main.js') }}"></script>
@endsection
