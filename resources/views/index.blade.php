@extends('layouts.app') @section('header')

<form action="/search" class="search" method="post">
  <div class="search__pulldown">
    @csrf
    <select name="area_id" class="search__pulldown__val1">
      <option value="">All area</option>
      @foreach($areas as $area)
      <option value="{{$area->id}}">{{$area->name}}</option>
      @endforeach
    </select>
  </div>
  <div class="genre">
    @csrf
    <select name="genre_id" class="search__pulldown__val2">
      <option value="">All genre</option>
      @foreach($genres as $genre)
      <option value="{{$genre->id}}">{{$genre->name}}</option>
      @endforeach
    </select>
  </div>
  @csrf
  <input
    name="name"
    class="search__box"
    type="text"
    placeholder="🔍 Search..."
    onchange="this.form.submit()"
  />
</form>
@endsection @section('content')
<div class="shop__area">
  @if($shops->isEmpty())
  <p class="search__result">検索結果は0件です</p>
  @else @foreach($shops as $shop)
  <div class="shop__card">
    <img class="shop__image" src="{{$shop->image_url}}" alt="" />
    <div class="shop__text">
      <h2 class="shop__title">{{$shop->name}}</h2>
      <div class="shop__tag">
        <p class="shop__tag1">#{{$shop->area->name}}</p>
        <p class="shop__tag2">#{{$shop->genre->name}}</p>
      </div>
      <div class="shop__btn">
        <button class="detail-btn">
          <a href="{{ route('detail', ['shop_id' => $shop->id ]) }}"
            >詳しくみる</a
          >
        </button>
        @auth @if(is_null($favorites))
        <form action="/favorite/add" method="post" class="heart__btn">
          @csrf
          <input type="hidden" name="_token" value="{{ csrf_token() }}" />
          <input type="hidden" name="shop_id" value="{{$shop->id}}" />
          <button type="submit" class="heart-gray">❤️</button>
        </form>
        @elseif($favorites->exists(Auth::id(), $shop->id))
        <form action="/favorite/delete" method="post">
          @csrf
          <input type="hidden" name="_token" value="{{ csrf_token() }}" />
          <input type="hidden" name="shop_id" value="{{$shop->id}}" />
          <button type="submit" class="heart-red">❤️</button>
        </form>
        @else
        <form action="/favorite/add" method="post">
          @csrf
          <input type="hidden" name="_token" value="{{ csrf_token() }}" />
          <input type="hidden" name="shop_id" value="{{$shop->id}}" />
          <button type="submit" class="heart-gray">❤️</button>
        </form>
        @endif @endauth @guest
        <a href="/login"><button class="heart-gray">❤️</button></a>
        @endguest
      </div>
    </div>
  </div>
  @endforeach @endif
</div>
@endsection
