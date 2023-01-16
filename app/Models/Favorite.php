<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;
use App\Models\Favorite;

class Favorite extends Model
{
    use HasFactory;

    protected $guarded =[
        'id'
    ];
    protected $fillable =[
        'user_id','shop_id', 'created_at', 'updated_at'
    ];
    
    public function shop() {
        return $this->belongsTo('App\Models\Shop');
    }
    public function user() {
        return $this->belongsTo('App\Models\User');
    }
    public function exists($id, $shop_id) {
            $favorite=Favorite::where('user_id', $id)->where('shop_id', $shop_id)->get();
            if(!$favorite->isEmpty()){
                return true;
            }else{
                return false;
            }

            }
}
