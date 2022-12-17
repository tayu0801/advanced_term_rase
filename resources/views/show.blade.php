@extends('layouts.default') @section('content')
<form method="POST" action="{{ route('create') }}">
  @csrf
  <table>
    <tr>
      <th>id</th>
      <th>name</th>
    </tr>
    <tr>
      <td>
        <input
          type="hidden"
          name="shop_id"
          value="{{$shop->id}}"
        />{{$shop->id}}
      </td>
      <td>
        <input
          type="hidden"
          name="shop_name"
          value="{{$shop->shop_name}}"
        />{{$shop->shop_name}}
      </td>
      <td>
        <input
          type="hidden"
          name="address"
          value="{{$shop->address}}"
        />{{$shop->address}}
      </td>
      <td>
        <input
          type="hidden"
          name="phone"
          value="{{$shop->phone}}"
        />{{$shop->phone}}
      </td>
      <td>
        <input
          type="hidden"
          name="email"
          value="{{$shop->email}}"
        />{{$shop->email}}
      </td>
      <td>
        <input
          type="hidden"
          name="detail"
          value="{{$shop->detail}}"
        />{{$shop->detail}}
      </td>
      <td>
        <input
          type="hidden"
          name="genre"
          value="{{$shop->genre}}"
        />{{$shop->genre}}
      </td>
    </tr>
  </table>
  <div class="calender">
    <label for="date">予約日</label>
    <input type="date" id="date" name="date" value="" />
  </div>
  <div class="start_time">
    <label for="start_time">開始時間</label>
    <input type="time" id="start_time" name="start_time" value="" />
  </div>
  <div class="end_time">
    <label for="end_time">終了時間</label>
    <input type="time" id="end_time" name="end_time" value="" />
  </div>
  <div class="number">
    <label for="number">予約人数</label>
    <select id="number" name="number">
      @for ($i = 0; $i < 5; $i++)
      <option value="{{ $i }}">{{ $i }}</option>
      @endfor
    </select>
  </div>

  <div class="button-area">
    <button class="send-button" type="submit" name="action" value="submit">
      登録
    </button>
    <button class="back-button" type="submit" name="action" value="back">
      修正
    </button>
  </div>
</form>
@endsection
