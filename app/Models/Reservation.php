<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
  use HasFactory;

  protected $fillable = ["user_id", "shop_id", "start_at", "num_of_users"];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function shop()
  {
    return $this->belongsTo(Shop::class);
  }
}
