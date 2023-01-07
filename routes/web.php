<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationController;

Route::get("/", [ReservationController::class, "index"])->name("index");
Route::get("/search", [ReservationController::class, "search"])->name("search");
Route::post("/create", [ReservationController::class, "create"])->name(
  "create"
);
Route::post("/favorite", [ReservationController::class, "favorite"])->name(
  "favorite"
);
Route::get("/mypage", [ReservationController::class, "mypage"])->name("mypage");
Route::get("/show/{id}", [ReservationController::class, "show"])->name("show");
require __DIR__ . "/auth.php";
