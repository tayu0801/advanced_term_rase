<?php

namespace App\Http\Controllers;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Favorite;
use App\Models\Reservation;
use App\Models\ShopReview;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MypageController extends Controller
{

    public function index( Request $request)
    {

        $user_id=Auth::id();
        $shops=Shop::all();
        $reservations=Reservation::where('user_id', $user_id)->get();
        $favorites=Favorite::where('user_id', $user_id)->get();
        $now=Carbon::now();
        $param=[
            'shops'=>$shops,
            'reservations'=>$reservations,
            'favorites'=>$favorites,
            'now'=>$now
        ];
        return view('/mypage', $param);
    }
    
}