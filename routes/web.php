<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationController;

Route::get("/", [ReservationController::class, "index"])->name("index");
Route::post("/create", [ReservationController::class, "create"])->name(
  "create"
);
Route::get("/show/{id}", [ReservationController::class, "show"])->name("show");
