<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Shop;
use App\Models\Reservation;
use App\Models\Favorite;
use Illuminate\Http\Request;
use App\Http\Requests\ReservationRequest;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
  public function create(ReservationRequest $request)
  {
    $user_id = Auth::user()->id;
    $shops = Shop::with('reservations')->get();
    $datetime = $request->date . ' ' . $request->time;
    $param = [
      'user_id' => $user_id,
      'shop_id'=> $request->shop_id,
      'start_at' => date('Y-m-d H:i',
                      strtotime($request->date.' '.$request->time),
      ),
      'num_of_users' => $request->number
    ];
    Reservation::create($param);
    return view('/done');
	}


  public function update(ReservationRequest $request)
  {
    $user_id = Auth::user()->id;
    $datetime = $request->date . ' ' . $request->time;
    $param = [
      'id' => $request->id,
      'user_id' => $user_id,
      'shop_id'=> $request->shop_id,
      'start_at' => $datetime,
      'num_of_users' => $request->number,
      '_token'=> $request->_token
    ];
    unset($param['_token']);
    Reservation::where('id', $request->id)->update($param);
    return view('/done');
	}

  public function remove(Request $request)
  {
    Reservation::find($request->id)->delete();
    return redirect('/mypage');
  }
    public function done(Request $request)
  {
    return $this;
  }
}
