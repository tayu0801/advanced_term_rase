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
      $table->string("shop_name", 255)->nullable(false);
      $table->string("address", 255)->nullable(false);
      $table->string("phone", 255);
      $table->string("email", 255);
      $table->text("detail");
      $table->string("genre", 255);
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
