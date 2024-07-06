<?php

use App\Http\Controllers\SessionController;
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

// TODO：ダミーデータなので実データを返す様に修正する
// （TOP）タグ一覧
Route::get('/tags', function () {
    return response()->json([
        [
            'id' => 1,
            'tag_name' => 'もくもく会'
        ],
        [
            'id' => 2,
            'tag_name' => '勉強会'
        ],
        [
            'id' => 3,
            'tag_name' => 'React'
        ],
        [
            'id' => 4,
            'tag_name' => 'Next.js'
        ],
        [
            'id' => 5,
            'tag_name' => 'Vue'
        ],
        [
            'id' => 6,
            'tag_name' => 'Nuxt.js'
        ],
        [
            'id' => 7,
            'tag_name' => 'Javascript'
        ],
        [
            'id' => 8,
            'tag_name' => 'Typescript'
        ],
        [
            'id' => 9,
            'tag_name' => 'Python'
        ],
        [
            'id' => 10,
            'tag_name' => 'Java'
        ],
        [
            'id' => 11,
            'tag_name' => 'Go'
        ],
        [
            'id' => 12,
            'tag_name' => 'Laravel'
        ],
        [
            'id' => 13,
            'tag_name' => '自然言語処理'
        ],
        [
            'id' => 14,
            'tag_name' => '機械学習'
        ],
        [
            'id' => 15,
            'tag_name' => '英会話'
        ],
        [
            'id' => 16,
            'tag_name' => '数学'
        ],
    ]);
});

// （TOP）セッション一覧
Route::get('/sessions', [SessionController::class, 'index'])->name('index');

// (セッション)セッション詳細
Route::get('sessions/{id}', [SessionController::class, 'show'])->name('show');

Route::post('sessions/register', [SessionController::class, 'register'])->name('register');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
