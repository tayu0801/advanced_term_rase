@extends('layouts.app') @section('header') @endsection @section('content')
<div class="detail">
  <div class="detail__area">
    <div class="detail__col1">
      <div class="detail__col1-row1">
        <button class="back-btn" onClick="history.back();"><</button>
        <h2 class="shop-name">{{$shop->name}}</h2>
      </div>
      <img class="shop__img2" src="{{asset($shop->image_url)}}" alt="" />
      <div class="shop__tag">
        <p class="shop__tag1 detail__text">#{{$shop->area->name}}</p>
        <p class="shop__tag2 detail__text">#{{$shop->genre->name}}</p>
      </div>
      <p class="detail__text">{{$shop->description}}</p>
    </div>
    <div class="detail__col2">
      <div class="reservation__area">
        <h2 class="reservation-title">予約</h2>
        <form action="/reservation" method="post">
          @csrf
          <input
            type="date"
            class="date reservation-text"
            name="date"
            value="date"
            id="pulldown_date"
          />
          @error('date')
          <tr>
            <th>Error</th>
            <td>{{ $message }}</td>
          </tr>
          <br />
          @enderror
          <select class="time reservation-text" id="pulldown_time" name="time">
            <option>時間</option>
            @for($i=11; $i<=22; $i++)
            <option value="{{ $i }}:00">{{ $i }}:00</option>
            <option value="{{ $i }}:30">{{ $i }}:30</option>
            @endfor
            <option value="23:00">23:00</option>
          </select>
          @error('time')
          <tr>
            <th>Error</th>
            <td>{{ $message }}</td>
          </tr>
          <br />
          @enderror
          <select
            class="number reservation-text"
            id="pulldown_number"
            name="number"
          >
            <option>人数</option>
            @for($i=1; $i<=30; $i++)
            <option value="{{ $i }}">{{ $i }}人</option>
            @endfor
          </select>
          @error('number')
          <tr>
            <th>Error</th>
            <td>{{ $message }}</td>
          </tr>
          <br />
          @enderror
          <input type="hidden" name="_token" value="{{ csrf_token() }}" />
          <input type="hidden" name="shop_id" value="{{$shop->id}}" />
          @for($i=1; $i<=3; $i++)
          <br />
          @endfor
          <div class="reservation-text">
            <table class="reservation__info">
              <tr>
                <th class="reservation__info-row">Shop</th>
                <td>{{$shop->name}}</td>
              </tr>
              <tr>
                <th class="reservation__info-row">Date</th>
                <td><p id="text_date"></p></td>
              </tr>
              <tr>
                <th class="reservation__info-row">Time</th>
                <td><p id="text_time"></p></td>
              </tr>
              <tr>
                <th class="reservation__info-row">Number</th>
                <td><p id="text_number"></p></td>
              </tr>
            </table>
          </div>
          @auth
          <input type="submit" class="reservation-btn" value="予約する" />
          @endauth
        </form>
        @guest
        <button class="reservation-btn">
          <a href="/login">予約する</a>
        </button>
        @endguest
      </div>
    </div>
  </div>
</div>
@endsection
