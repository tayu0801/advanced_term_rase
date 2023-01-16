@extends('layouts.app')

@section('header')
  <header class="shop__header">
    <div class="header__container flex-item">
@endsection
@section('content')
  </header><br>

  @guest
    <div class="mypage__guest">
      <p>ログインをしてご利用ください</p>
      <button class="login__btn"><a href="/login">ログイン画面へ</a></button>
    </div>
  @endguest
  @auth
    <div class="name__container">
      <h2>{{Auth::user()->name}}さん</h2>
    </div>
    @if ($errors->any())
      <div class="alert alert-danger mt-3">
        <ul>
          @foreach ($errors->all() as $error)
            <li>&emsp;&emsp;{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
    <div class="mypage__container">
      <div class="reservation__history__container">
        @foreach($reservations as $reservation)
          @if($reservation->start_at > $now)
            <div class="reservation__container-small">
              <h3 class="reservation__ttl">予約状況</h3>
                <div class="reservation__item">
                  <div class="reservation__count flex-item">
                    <div class="clock__count flex-item">
                      <img src="img/clock.png" class="clock" alt="">
                      <p class="count">予約{{$loop->iteration}}</p>
                    </div>
                    <form action="/reservation"  method="post">
                      @csrf
                      <input type="hidden" name="id" value="{{$reservation->id}}">
                      <input type="submit" class="batsu" value="×">
                    </form>
                  </div>
                  <form action="/reservation/edit" method="post">
                    @csrf
                      <table class="myreservation__table">
                        <tr>
                          <th class="reservation__th">Shop</th>
                          <td><span class="reservatioin__name">{{$reservation->shop->name}}</span></td>
                        </tr>
                        <tr>
                          <th class="reservation__th">Date</th>
                          <td><input type="text" class="reservation__date" name="date" value="{{\Carbon\Carbon::parse($reservation->datetime)->format('Y-m-d')}}">
                          </td>
                        </tr>
                        <tr>
                          <th class="reservation__th">Time</th>
                          <td>
                            <select class="reservation__time" name="time" >
                              @for($i=11; $i<=22; $i++)
                                <option value="{{$i}}:00" @if(\Carbon\Carbon::parse($reservation->datetime)->format('H:i')===$i.':00') selected @endif>{{$i}}:00</option>
                                <option value="{{$i}}:30" @if(\Carbon\Carbon::parse($reservation->datetime)->format('H:i')===$i.':30') selected @endif>{{$i}}:30</option>
                              @endfor
                              <p>▼</p>
                            </select>
                          </td>
                        </tr>
                        <tr>
                          <th class="reservation__th">Number</th>
                          <td>
                            <select class="reservation__number" name="number">
                              @for($i=1; $i<=10; $i++)
                              <option value="{{$i}}" @if($reservation->number===$i) selected @endif>{{$i}}人</option>
                              @endfor
                            </select><br>
                          </td>
                        </tr>
                        <tr>
                          <th></th>
                          <td>
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="id" value="{{$reservation->id}}">
                            <input type="hidden" name="shop_id" value="{{$reservation->shop_id}}">
                            <button type="submit" class="update__btn">予約変更</button>
                          </td>
                        </tr>
                      </table>
                  </form>
                </div>
            </div>
          @else
            <div class="history__container">
              <h3 class="history__ttl">ご利用履歴</h3>
                <div class="history__item">
                  @csrf
                    <input type="button" id="reviewBtn" value="レビューを投稿する" class="reviewBtn">
                      <div id="modal" class="modal">
                        <div class="modal__content">
                          <div class="modal__content-inner">
                            <form action="/review/add" method="post">
                              @csrf
                                <div class="modal-body">
                                  <p class="review__title">
                                    【満足度】
                                  </p>
                                  <div class="evaluation">
                                    <p>非常に残念</p>
                                    <p>非常に満足</p>
                                  </div>
                                  <div class="rate-form">
                                    <input id="star5" type="radio" name="stars" value="5">
                                    <label for="star5">★</label>
                                    <input id="star4" type="radio" name="stars" value="4">
                                    <label for="star4">★</label>
                                    <input id="star3" type="radio" name="stars" value="3">
                                    <label for="star3">★</label>
                                    <input id="star2" type="radio" name="stars" value="2">
                                    <label for="star2">★</label>
                                    <input id="star1" type="radio" name="stars" value="1">
                                    <label for="star1">★</label>
                                  </div>
                                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                                  <input type="hidden" class="shop_id" name="shop_id" value="{{$reservation->shop_id}}"><br><br>
                                  <textarea class="comment" wrap="soft" cols="20" rows="10" name="comment"></textarea><br><br>
                                  <button type="submit" id="closeBtn">投稿</button>
                                </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    <table class="history__table">
                      <tr>
                        <th>Shop</th>
                        <td>{{$reservation->shop->name}}</td>
                      </tr>
                      <tr>
                        <th>Date</th>
                        <td>{{\Carbon\Carbon::parse($reservation->start_at)->format('Y-m-d')}}
                        </td>
                      </tr>
                      <tr>
                        <th>Time</th>
                        <td>{{\Carbon\Carbon::parse($reservation->start_at)->format('H:i')}}
                        </td>
                      </tr>
                      <tr>
                        <th>Number</th>
                        <td>{{$reservation->num_of_users}}</td>
                      </tr>
                    </table>
                </div>
            </div>
          @endif
        @endforeach
      </div>
      <div class="favorite__container">
        <div class="favorite-ttl">
          <h3>お気に入り店舗</h3>
        </div>
        <div class="favorite__container-small">
          @foreach($favorites as $favorite)
            <div class="shop__item">
              <div class="shop__image">
                <img src="{{$favorite->shop->image_url}}" alt="">
              </div>
              <div class="shop__title">
                <h2>{{$favorite->shop->name}}</h2>
                <p>#{{$favorite->shop->area->name}}&emsp;#{{$favorite->shop->genre->name}}</p>
              </div>
              <div class="shop__btn flex-item">
                <button class="detail__btn"><a href="{{ route('detail', ['shop_id' => $favorite->shop->id ]) }}">詳しくみる</a></button>
                <form action="/favorite/delete" method="post">
                  @csrf
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                  <input type="hidden" name="shop_id" value="{{$favorite->shop_id}}">
                  <button type="submit" class="heart">❤️</button>
                </form>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  @endauth
@endsection
