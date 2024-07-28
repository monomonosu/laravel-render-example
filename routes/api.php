<?php

use App\Http\Controllers\SessionController;
use App\Http\Controllers\TagController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/health', function () {
    return 'HelloWorld!Api!';
});

// タグ一覧
Route::get('/tags', [TagController::class, 'index'])->name('tags');

// （TOP）セッション一覧
Route::get('/sessions', [SessionController::class, 'index'])->name('index');

// (セッション)セッション詳細
Route::get('sessions/{id}', [SessionController::class, 'show'])->name('show');

// (セッション)セッション登録
Route::post('sessions/register', [SessionController::class, 'register'])->name('register');

// (セッション)セッション更新
Route::put('sessions/{id}', [SessionController::class, 'update'])->name('update');

// (セッション)セッション削除
Route::post('sessions/delete/{id}', [SessionController::class, 'destroy'])->name('destroy');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
