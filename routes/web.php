<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\ShopReviewController;
use App\Http\Controllers\AdminController;

Route::get('/', [ShopController::class, 'index']);
Route::get('/detail/{shop_id}',  [ShopController::class, 'detail'])-> name('detail');
Route::post('/search', [ShopController::class, 'search']);
Route::get('/thanks', [ShopController::class, 'thanks']);

Route::get('/mypage', [MypageController::class, 'index']);

Route::post('/reservation', [ReservationController::class, 'create']);
Route::post('/reservation/edit', [ReservationController::class, 'update']);
Route::post('/reservation/delete', [ReservationController::class, 'remove']);
Route::get('/done', [ReservationController::class, 'done']);

Route::post('/favorite', [FavoriteController::class, 'create']);
Route::post('/favorite/delete', [FavoriteController::class, 'remove']);

Route::post('/review/add', [ShopReviewController::class, 'create']);

Route::get('/registered', [AdminController::class, 'registered']);
Route::get('/complete', [AdminController::class, 'complete']);

Route::get('/thanks', function () {
    return view('thanks');
})->middleware(['verified'])->name('thanks');

require __DIR__.'/auth.php';
