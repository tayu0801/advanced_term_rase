<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create("shops", function (Blueprint $table) {
      $table->bigIncrements("id");
      $table->string("name", 255)->nullable(false);
      $table->text("description")->nullable(false);
      $table->integer("area_id")->nullable(false);
      $table->integer("genre_id")->nullable(false);
      $table->string("image_url")->nullable(false);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists("shops");
  }
}
