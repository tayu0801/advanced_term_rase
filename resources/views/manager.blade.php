@extends('layouts.admin') @section('content')
<div class="register__Page">
  <div class="name__container">
    <h2>{{Auth::user()->name}}様</h2>
    <br />
  </div>
  <div class="register__container">
    <h4 class="register__title">&emsp;店舗代表者用：店舗登録画面</h4>
    <form action="/shop/add" method="post">
      @csrf
      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <input
          class="form-control"
          placeholder="店名をご記入ください"
          type="text"
          name="name"
          required
          autofocus
        /><br />
        @if ($errors->has('name'))
        <span class="help-block">
          <strong>{{ $errors->first('name') }}</strong>
        </span>
        @endif
      </div>
      <div class="area">
        <select name="area_id" class="register__area">
          <option value="">エリア：ご選択ください▼</option>
          @foreach($areas as $area)
          <option value="{{$area->id}}">{{$area->name}}</option>
          @endforeach
        </select>
      </div>
      <div class="genre">
        <select name="genre_id" class="register__genre">
          <option value="">ジャンル：ご選択ください▼</option>
          @foreach($genres as $genre)
          <option value="{{$genre->id}}">{{$genre->name}}</option>
          @endforeach
        </select>
      </div>
      <div
        class="form-group{{ $errors->has('description') ? ' has-error' : '' }}"
      >
        <textarea
          class="form-control-detail"
          placeholder="店舗詳細情報をご記入ください"
          name="description"
          wrap="soft"
          required
        ></textarea
        ><br />
        @if ($errors->has('description'))
        <span class="help-block">
          <strong>{{ $errors->first('description') }}</strong>
        </span>
        @endif
      </div>
      <input type="hidden" name="user_id" value="{{ $id }}" />
      <input type="submit" name="commit" value="登録" class="register__Btn" />
    </form>
  </div>
  <br />
  <div class="registered__shop">
    @foreach($managements as $management)
    <div class="registered__container">
      @if(isset($management))
      <h4 class="register__title">&emsp;店舗登録履歴</h4>
      <form action="/shop/edit" method="post">
        @csrf
        <input
          type="text"
          name="name"
          class="edit__info"
          value="{{$management->name}}"
        /><br />
        <select name="area_id" class="edit__info">
          @foreach($areas as $area)
          <option value="{{$area->id}}" @if($area->
            id === $management->area_id) selected @endif>{{$area->name}}
          </option>
          @endforeach
        </select>
        <select name="genre_id" class="edit__info">
          @foreach($genres as $genre)
          <option value="{{$genre->id}}" @if($genre->
            id === $management->genre_id) selected @endif>{{$genre->name}}
          </option>
          @endforeach</select
        ><br />
        <textarea
          name="description"
          class="edit__detail"
          wrap="soft"
          >{{$management->description}}</textarea
        ><br />
        <input type="hidden" name="id" value="{{$management->id}}" />
        <input type="hidden" name="user_id" value="{{$management->user_id}}" />
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <button type="submit" class="edit__btn">店舗情報変更</button>
      </form>
      @endif
    </div>
    <br /><br />
    @endforeach
  </div>
</div>
@foreach($managements as $management) @foreach($reservations as $reservation)
@if($management->id === $reservation->shop->id)
<div class="reservation-manager">
  <h3 class="reservation__ttl">予約状況</h3>
  <div class="reservation__item-manager">
    <p class="count">予約{{$loop->iteration}}</p>
    <table class="admin-reservation__table">
      <tr>
        <th class="reservation__th">Shop</th>
        <td>{{$reservation->shop->name}}</td>
      </tr>
      <tr>
        <th class="reservation__th">Name</th>
        <td>{{$reservation->user->name}}</td>
      </tr>
      <tr>
        <th class="reservation__th">Datetime</th>
        <td>{{$reservation->start_at}}</td>
      </tr>
      <tr>
        <th class="reservation__th">Number</th>
        <td>{{$reservation->num_of_users}}人</td>
      </tr>
    </table>
  </div>
</div>
@endif @endforeach @endforeach @endsection
