<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $guarded =[
        'id'
    ];
    protected $fillable =[
        'name', 'created_at', 'updated_at'
    ];

    public function shops() {
        return $this->hasMany(Shop::class);
    }
}
