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
      "name" => "yousyoku",
    ];
    Genre::create($param);
    $param = [
      "name" => "chuka",
    ];
    Genre::create($param);
  }
}
