<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Shop;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index(Request $request)
    {
	}

    public function create(Request $request)
    {
        $user_id = Auth::user()->id;
        $shops = Shop::with('favorites')->get();
        $shop_id=$request->shop_id;
        $param = [
            'shops'=>$shops,
            'user_id' =>$user_id,
            'shop_id'=> $shop_id
        ];
        Favorite::create($param);
        return back();
    }

    public function remove(Request $request){
        Favorite::where('shop_id', $request->shop_id)->delete();
        return back();
    }

}
