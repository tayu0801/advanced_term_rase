<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Reservation;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Favorite;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class reservationController extends Controller
{
  // 店一覧表示
  public function index()
  {
    // 全店舗の取得
    $shops = Shop::with(["genre", "area"])
      ->get()
      ->toArray();

    // ユーザーの取得
    $user = Auth::user();
    $areas = Area::all();
    $genres = Genre::all();

    // ユーザーのお気に入り店を取得
    $favorites = Favorite::where("user_id", \Auth::user()->id)
      ->get()
      ->toArray();

    foreach ($favorites as $favorite) {
      // お気に入り店が全店舗の何番目に存在しているかインデックス番号を取得
      $index_no = array_search(
        $favorite["shop_id"],
        array_column($shops, "id")
      );
      // 取得したインデックス番号点にお気に入りフラグをオン
      $shops[$index_no] = array_merge($shops[$index_no], ["favorite" => "1"]);
    }

    return view("index", [
      "user" => $user,
      "shops" => $shops,
      "areas" => $areas,
      "genres" => $genres,
    ]);
  }

  public function search(Request $request)
  {
    $inputs = $request->all();
    $query = Shop::query();
    if ($inputs["input_area"] == "0") {
      $query->where("area_id", ">", 0);
    } else {
      $query->where("area_id", "=", $inputs["input_area"]);
    }
    if ($inputs["input_genre"] == "0") {
      $query->where("genre_id", ">", "0");
    } else {
      $query->where("genre_id", "=", $inputs["input_genre"]);
    }
    $query->where("name", "like", "%" . $inputs["input_shop"] . "%");

    $shops = $query->Paginate(15);

    $user = Auth::user();
    $areas = Area::all();
    $genres = Genre::all();

    return view("index", [
      "user" => $user,
      "shops" => $shops,
      "areas" => $areas,
      "genres" => $genres,
    ]);
  }

  // 店詳細ページ表示
  public function show($id)
  {
    // $shop = Shop::find($id);
    $shop = Shop::with(["genre", "area"])->find($id);
    // ->where("user_id", Auth::id())
    // ->get();
    // dd($shop);
    return view("show", compact("shop"));
  }

  // お気に入り登録
  public function favorite(Request $request)
  {
    $shop_id = intval($request->only(["shop_id"])["shop_id"]);
    // ユーザーのお気に入り店を取得
    $favorite = Favorite::where("user_id", \Auth::user()->id)
      ->where("shop_id", $shop_id)
      ->get()
      ->toArray();

    // お気に入りが存在していれば削除、存在していなければ追加
    if (empty($favorite)) {
      Favorite::create([
        "user_id" => \Auth::user()->id,
        "shop_id" => $shop_id,
      ]);
    } else {
      Favorite::find($favorite[0]["id"])->delete();
    }

    return $this->index();
  }

  // 予約データ作成
  public function create(Request $request)
  {
    $inputs = $request->all();
    $shop_id = intval($inputs["shop_id"]);

    Reservation::create([
      "user_id" => \Auth::user()->id,
      "shop_id" => $shop_id,
      "start_at" => date(
        "Y-m-d H:i",
        strtotime($inputs["input_date"] . " " . $inputs["input_time"])
      ),
      "num_of_users" => $inputs["input_number"],
    ]);
    return $this->index();
  }

  public function logout(Request $request)
  {
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect()->route("login");
  }
}
