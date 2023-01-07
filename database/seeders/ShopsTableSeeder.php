<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Shop;

class ShopsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $param = [
      "name" => "テスト1",
      "description" => "詳細ccccccccccccccccccccccccccccccc",
      "area_id" => "1",
      "genre_id" => "2",
      "image_url" => "test3333",
    ];
    Shop::create($param);
    $param = [
      "name" => "テスト2",
      "description" => "詳細ccccccccccccccccccccccccccccccc",
      "area_id" => "2",
      "genre_id" => "3",
      "image_url" => "test",
    ];
    Shop::create($param);
  }
}
