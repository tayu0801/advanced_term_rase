<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Shop;
use App\Models\Reservation;
use App\Models\ShopReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopReviewController extends Controller
{
    public function create(Request $request) {
        $result = false;
        $request->validate([
            'stars' => 'required',
            'comment' => 'required'
        ]);
        $exists = ShopReview::where('user_id', $request->user()->id)
        ->where('shop_id', $request->shop_id)
        ->exists();

    if($exists) {
        return back()->withInput()->withErrors('すでにレビューは投稿されています');
}
    else{
        $user_id = Auth::user()->id;
        $stars = $request->stars;
        $shop_id= $request->shop_id;
        $comment = $request->comment;
        $param = [
            'user_id' => $user_id,
            'shop_id'=> $shop_id,
            'stars' => $stars,
            'comment' => $comment
        ];    
        ShopReview::create($param);
        return back();
    }    
    }
}

