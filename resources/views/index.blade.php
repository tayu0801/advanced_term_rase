
@extends('layouts.app')

@section('header')
  <header class="header flex-item">
    <div class="header__container flex-item">
@endsection

@section('content')
    <form action="/search" class="search__var flex-item" method="post">
      @csrf
      @if($errors->has('name'))
        <tr>
          <th>ERROR</th>
          <td>
            {{$errors->first('task')}}
          </td>
        </tr>
      @endif
        <div class="area">
          @csrf
          <select name="area_id" class="search__area">
            <option value="">All area</option>
            @foreach($areas as $area)
              <option value="{{$area->id}}">{{$area->name}}</option>
            @endforeach
          </select>
        </div>
        <span class="line">|</span>
        <div class="genre">
          @csrf
          <select name="genre_id" class="search__genre">
            <option value="">All genre</option>
            @foreach($genres as $genre)
              <option value="{{$genre->id}}">{{$genre->name}}</option>
            @endforeach
          </select>
        </div>
        <span class="line">|</span>
        @csrf
        <input name="name" class="search__name" type="text" placeholder="🔍 search..." onchange="this.form.submit()">
    </form>
  </header>
    <div class="shop__container">
    @if($shops->isEmpty())
      <p>検索結果は0件です</p>
    @else
      @foreach($shops as $shop)
          <div class="shop__item">
            <div class="shop__image">
              <img src="{{$shop->image_url}}" alt="">
            </div>
            <div class="shop__title">
              <h2>{{$shop->name}}</h2>
              <p>#{{$shop->area->name}}&emsp;#{{$shop->genre->name}}</p>
            </div>
            <div class="shop__btn flex-item">
              <button class="detail__btn"><a href="{{ route('detail', ['shop_id' => $shop->id ]) }}">詳しくみる</a></button>
              @auth
                @if(is_null($favorites))
                  <form action="/add/favorite" method="post">
                  @csrf
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" name="shop_id" value="{{$shop->id}}">
                    <button type="submit" class="heart_gray">❤️</button>
                  </form>
                @elseif($favorites->exists(Auth::id(), $shop->id))
                  <form action="/favorite/delete" method="post">
                  @csrf
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" name="shop_id" value="{{$shop->id}}">
                    <button type="submit" class="heart">❤️</button>
                  </form>
                @else
                  <form action="/favorite" method="post">
                  @csrf
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" name="shop_id" value="{{$shop->id}}">
                    <button type="submit" class="heart_gray">❤️</button>
                  </form>
                @endif
              @endauth
              @guest
                @csrf
                <a href="/login"><button  class="heart_gray">❤️</button></a>
              @endguest
            </div>
          </div>
      @endforeach
    @endif
    </div>
@endsection
