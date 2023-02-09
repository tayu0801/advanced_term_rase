@extends('layouts.app') @section('content') @guest
<button class="login__btn"><a href="/login">ログイン画面へ</a></button>
@endguest @auth
<div class="name__area">
  <h2>{{Auth::user()->name}}さん</h2>
</div>

<div class="mypage">
  <div class="mypage__col1">
    <div hidden class="notdip">{{$cnt=0}}</div>
    <h3 class="reservation__title">予約状況</h3>
    @foreach($reservations as $reservation) @if($reservation->start_at > $now)
    <div hidden class="notdip">{{$cnt++}}</div>

    <div class="mypage__reservation__area">
      <div class="mypage__reservation__card">
        <div class="mypage__reservation__row">
          <div class="mypage__reservation__row2">
            <img src="img/clock.png" class="clock" alt="" />
            <h3 class="reservation-no">予約{{ $cnt }}</h3>
          </div>
          <form action="/reservation/delete" method="post">
            @csrf
            <input type="hidden" name="id" value="{{$reservation->id}}" />
            <input type="submit" class="batsu" value="×" />
          </form>
        </div>
        <form action="/reservation/edit" method="post">
          @csrf
          <table class="myreservation__table">
            <tr>
              <th class="reservation__th">Shop</th>
              <td>
                <span
                  class="reservatioin__name"
                  >{{$reservation->shop->name}}</span
                >
              </td>
            </tr>
            <tr>
              <th class="reservation__th">Date</th>
              <td>
                <input
                  type="date"
                  class="reservation__date"
                  name="date"
                  value="{{\Carbon\Carbon::parse($reservation->start_at)->format('Y-m-d')}}"
                />
              </td>
            </tr>
            <tr>
              <th class="reservation__th">Time</th>
              <td>
                <select class="reservation__time" name="time">
                  {{$start_at = substr($reservation->start_at,11,5)}}
                  @for($i=11; $i<=22; $i++) @if($start_at==$i.":00")
                  <option value="{{ $i }}:00" selected>{{ $i }}:00</option>
                  @else
                  <option value="{{ $i }}:00">{{ $i }}:00</option>
                  @endif @if($start_at==$i.":30")
                  <option value="{{ $i }}:30" selected>{{ $i }}:30</option>
                  @else
                  <option value="{{ $i }}:30">{{ $i }}:30</option>
                  @endif @endfor
                </select>
              </td>
            </tr>
            <tr>
              <th class="reservation__th">Number</th>
              <td>
                <select class="reservation__number" name="number">
                  @for($i=1; $i<=30; $i++)
                  <option value="{{ $i }}" @if($reservation->
                    num_of_users===$i) selected @endif>{{ $i }}人
                  </option>
                  @endfor</select
                ><br />
              </td>
            </tr>
            <tr>
              <th></th>
              <td>
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <input type="hidden" name="id" value="{{$reservation->id}}" />
                <input
                  type="hidden"
                  name="shop_id"
                  value="{{$reservation->shop_id}}"
                />
                <button type="submit" class="update-btn">予約変更</button>
              </td>
            </tr>
          </table>
        </form>
      </div>
    </div>
    @endif @endforeach
  </div>
  <div class="mypage__col2">
    <h3 class="favorite-title">お気に入り店舗</h3>
    <div class="favorite__area">
      @foreach($favorites as $favorite)
      <div class="shop__card">
        <img class="shop__image" src="{{$favorite->shop->image_url}}" alt="" />
        <div class="shop__text">
          <h2 class="shop__title">{{$favorite->shop->name}}</h2>
          <div class="shop__tag">
            <p class="shop__tag1">#{{$favorite->shop->area->name}}&</p>
            <p class="shop__tag2">##{{$favorite->shop->genre->name}}</p>
          </div>
          <div class="shop__btn">
            <button class="detail-btn">
              <a
                href="{{ route('detail', ['shop_id' => $favorite->shop->id ]) }}"
                >詳しくみる</a
              >
            </button>
            <form action="/favorite/delete" method="post">
              @csrf
              <input type="hidden" name="_token" value="{{ csrf_token() }}" />
              <input
                type="hidden"
                name="shop_id"
                value="{{$favorite->shop_id}}"
              />
              <button type="submit" class="heart-red">❤️</button>
            </form>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endauth @endsection
