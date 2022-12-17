<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Reservation;
use Illuminate\Http\Request;

class reservationController extends Controller
{
  // 店一覧表示
  public function index()
  {
    $shops = Shop::all();
    return view("index", ["shops" => $shops]);
  }

  // 店詳細ページ表示
  public function show($id)
  {
    $shop = Shop::find($id);
    return view("show", compact("shop"));
  }

  // 予約データ作成
  public function create(Request $request)
  {
    // 修正・登録のどちらをクリックしたのか判定
    // actionの値を取得
    $action = $request->input("action");
    // action以外のinputの値を取得
    $inputs = $request->except("action");
    // 再表示用のために取得
    $shops = Shop::all();
    //actionの値で分岐
    if ($action !== "submit") {
      return view("index", ["shops" => $shops]);
    } else {
      $inputs = array_merge($inputs, [
        "user_id" => 1,
      ]);
      // 送信ボタンの場合、問い合わせデータ作成
      Reservation::create($inputs);
      return view("index", ["shops" => $shops]);
    }
  }
}
