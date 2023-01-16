@extends('layouts.app') @section('header')
<div class="header__container flex-item">
  @endsection @section('content') @if ($errors->any())
  <div class="alert alert-danger mt-3">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif
  <div class="detail">
    <div class="detail__container flex-item">
      <div class="detail__container-small">
        <div class="shop__name flex-item">
          <h2>
            <button
              class="rounded-md bg-gray-800 text-white px-4 py-2"
              onClick="history.back();"
            >
              <</button
            >&nbsp;{{$shop->name}}
          </h2>
        </div>
        <div class="shop__image">
          <img src="{{asset($shop->image_url)}}" alt="" />
        </div>
        <div class="shop__detail">
          <p>#{{$shop->area->name}}&emsp;#{{$shop->genre->name}}</p>
          <p>{{$shop->description}}</p>
        </div>
      </div>
    </div>
    <div class="reservation__container">
      <h2>予約</h2>
      <form action="/reservation" method="post">
        @csrf
        <input type="date" class="date" name="date" value="date" /><br />
        <select class="time" name="time">
          <option>時間</option>
          @for($i=11; $i<=22; $i++)
          <option value="{{ $i }}:00">{{ $i }}:00</option>
          <option value="{{ $i }}:30">{{ $i }}:30</option>
          @endfor
          <option value="23:00">23:00</option>
        </select>
        <select class="number" name="number">
          <option>人数</option>
          @for($i=1; $i<=10; $i++)
          <option value="{{ $i }}">{{ $i }}人</option>
          @endfor</select
        ><br />
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <input type="hidden" name="shop_id" value="{{$shop->id}}" /><br />
        <div class="reservation__table-container">
          <table class="reservation__table">
            <tr>
              <th>&emsp;Shop</th>
              <td>{{$shop->name}}</td>
            </tr>
            <tr>
              <th>&emsp;Date</th>
              <td><p id="output_date"></p></td>
            </tr>
            <tr>
              <th>&emsp;Time</th>
              <td><p id="output_time"></p></td>
            </tr>
            <tr>
              <th>&emsp;Number</th>
              <td><p id="output_number"></p></td>
            </tr>
          </table>
        </div>
        @auth
        <input type="submit" class="reservation__btn" value="予約する" />
        @endauth
      </form>
      @guest
      <button class="reservation__btn">
        <a href="/login">予約する</a>
      </button>
      @endguest
    </div>
  </div>
  <div class="review__container">
    @if(isset($shop_reviews))
    <div class="review__container-small">
      @foreach($shop_reviews as $shop_review)
      <dl class="review__item">
        <dt>
          <div class="star__container">
            @for($i=0; $i < $shop_review->stars; $i++)
            <span class="fa fa-star checked"></span>
            @endfor @for ($j=0; $i+$j < 5; $j++)
            <span class="fa fa-star unchecked"></span>
            @endfor
          </div>
        </dt>
        <dd>
          <p>{{$shop_review->comment}}</p>
        </dd>
      </dl>
      @endforeach
    </div>
    @endisset
  </div>
  @endsection
</div>
