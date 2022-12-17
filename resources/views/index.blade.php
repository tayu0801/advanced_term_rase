@extends('layouts.default') @section('content')
<table>
  <tr>
    <th>id</th>
    <th>name</th>
  </tr>
  @foreach ($shops as $shop)
  <tr>
    <td>{{$shop->id}}</td>
    <td>{{$shop->shop_name}}</td>
    <td>
      <a href="{{ route('show', ['id'=>$shop->id]) }}" class="btn">詳細</a>
    </td>
  </tr>
  @endforeach
</table>
@endsection
