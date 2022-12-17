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
      "shop_name" => "テスト1",
      "address" => "東京都aaaaa",
      "phone" => "123-456-7889",
      "email" => "abc123@example.com",
      "detail" => "詳細bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb",
      "genre" => "洋食",
    ];
    Shop::create($param);
    $param = [
      "shop_name" => "テスト2",
      "address" => "大阪府aaaaa",
      "phone" => "123-456-7889",
      "email" => "def456@example.com",
      "detail" => "詳細ccccccccccccccccccccccccccccccc",
      "genre" => "中華",
    ];
    Shop::create($param);
  }
}
