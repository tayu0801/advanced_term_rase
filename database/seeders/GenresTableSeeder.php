<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenresTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $param = [
      "name" => "寿司",
    ];
    Genre::create($param);
    $param = [
      "name" => "焼肉",
    ];
    Genre::create($param);
    $param = [
      "name" => "居酒屋",
    ];
    Genre::create($param);
    $param = [
      "name" => "イタリアン",
    ];
    Genre::create($param);
    $param = [
      "name" => "ラーメン",
    ];
    Genre::create($param);
    $param = [
      "name" => "中華",
    ];
    Genre::create($param);
    $param = [
      "name" => "フレンチ",
    ];
    Genre::create($param);
    $param = [
      "name" => "和食",
    ];
    Genre::create($param);
    $param = [
      "name" => "うどん",
    ];
    Genre::create($param);
    $param = [
      "name" => "お好み焼き",
    ];
    Genre::create($param);
  }
}
