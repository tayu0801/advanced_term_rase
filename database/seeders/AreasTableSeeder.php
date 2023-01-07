<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Area;

class AreasTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $param = [
      "name" => "tokyo",
    ];
    Area::create($param);
    $param = [
      "name" => "osaka",
    ];
    Area::create($param);
  }
}
