<?php

namespace App\Http\Controllers;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Favorite;
use App\Models\Reservation;
use App\Models\ShopReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ShopController extends Controller
{


public function index(Request $request)
    {
    $id=Auth::id();
    $shops=Shop::all();

      //   $shops = Shop::with(["genre", "area"])
      // ->get();
        // dd($shops);
    $areas=Area::all();
    $genres=Genre::all();
    $shop_id=Favorite::with('shop_id');
    $favorites=Favorite::all()->first();
    $param=[
        'id'=>$id,
        'shops'=>$shops,
        'areas'=>$areas,
        'genres'=>$genres,
        'shop_id'=>$shop_id,
        'favorites'=>$favorites
    ];
    return view('/index', $param);
    }


public function detail(Request $request, $shop_id){
    $shop=Shop::find($shop_id);
    $shop_reviews=ShopReview::where('shop_id', $shop_id)->get();
    $param=[
    'shop_id'=>$shop_id,
    'shop'=>$shop,
    'shop_reviews' =>$shop_reviews
    ];
    return view('detail', $param);
}


public function search(Request $request){
    $areas=Area::all();
    $genres=Genre::all();
    $area_id=$request->area_id;
    $genre_id=$request->genre_id;
    $name=$request->name;
    $shop_id=Favorite::with('shop_id');
    $favorites=Favorite::all()->first();

    if(!empty($area_id)){
        $search=Shop::where('area_id', $area_id)->get();
    }
    if(!empty($genre_id)){
        $search=Shop::where('genre_id', $genre_id)->get();
    }
    if(!empty($name)){
        $search=Shop::where('name', 'like', "%{$name}%")->get();
    }
    if(!empty($area_id)&&($genre_id)){
        $search=Shop::where('area_id', $area_id)->where('genre_id', $genre_id)->get();
    }
    if(!empty($area_id)&&($name)){
        $search=Shop::where('area_id', $area_id)->where('name', 'like', "%{$name}%")->get();
    }
    if(!empty($$genre_id)&&($name)){
        $search=Shop::where('genre_id', $genre_id)->where('name', 'like', "%{$name}%")->get();
    }
    if(!empty($area_id)&&($genre_id)&&($name)){
        $search=Shop::where('area_id', $area_id)->where('genre_id', $genre_id)->where('name', 'like', "%{$name}%")->get();
    }
    if((empty($area_id))&&(empty($genre_id))&&(empty($name))){
        $search=Shop::all();
    }

    $param=[
        'areas'=>$areas,
        'genres'=>$genres,
        'area_id'=>$area_id,
        'genre_id'=>$genre_id,
        'shops'=>$search,
        'shop_id'=>$shop_id,
        'favorites'=>$favorites
    ];
    return view('/index', $param);
}



public function create(Request $request)
    {
    $name=$request->name;
    $area_id=$request->area_id;
    $genre_id=$request->genre_id;
    $detail=$request->detail;
    $user_id=$request->user_id;
    if($genre_id == 1)
        $image="img/sushi.jpg";
    if($genre_id == 2)
        $image="img/yakiniku.jpg";
    if($genre_id == 3)
        $image="img/izakaya.jpg";
    if($genre_id == 4)
        $imagee="img/italian.jpg";
    if($genre_id == 5)
        $image="img/ramen.jpg";
    $param=[
        'name'=>$name,
        'area_id'=>$area_id,
        'genre_id'=>$genre_id,
        'detail'=>$detail,
        'user_id'=>$user_id,
        'image'=>$image
    ];
    Shop::create($param);
    $admin = $request->admin;
    $manager = $request->manager;
    $param=[
    'admin' => $admin,
    'manager' => $manager
    ];
    return view('/complete', $param);
}


public function update(Request $request)
{
    $id = $request->id;
    $name = $request->name;
    $area_id =$request->area_id;
    $genre_id =$request->genre_id;
    $detail = $request->detail;
    $user_id = $request->user_id;
    $param = [
        'name' => $name,
        'area_id' => $area_id,
        'genre_id'=> $genre_id,
        'detail'=> $detail,
        'user_id'=> $user_id,
        '_token'=> $request->_token
    ];
    unset($param['_token']);
    Shop::find($id)->update($param);
    return view('/complete');
}


public function thanks(Request $request){

    return view('/thanks');
    }
}
