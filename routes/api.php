<?php

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
Route::get('/sessions', function () {
    return response()->json([
        [
            'id' => 1,
            'user_name' => null,
            'title' => null,
            'created_at' => "2022-01-01T01:41:28.000000Z",
            'tags' => null,
            'content' => null,
            'passion_level' => 1,
        ],
        [
            'id' => 2,
            'user_name' => "山田　太郎",
            'title' => "もくもく会しましょう",
            'created_at' => "2022-01-01T01:41:28.000000Z",
            'tags' => ["もくもく会"],
            'content' => "ジャンルはなんでもOKです。もくもく会に参加できる方募集中",
            'passion_level' => 2,
        ],
        [
            'id' => 3,
            'user_name' => "山田　花子",
            'title' => "Typescript勉強会",
            'created_at' => "2022-01-01T01:41:28.000000Z",
            'tags' => ["Typescript", "勉強会"],
            'content' => "Typescriptについて勉強しましょう。",
            'passion_level' => 3,
        ],
        [
            'id' => 4,
            'user_name' => "",
            'title' => "",
            'created_at' => "2022-01-01T01:41:28.000000Z",
            'tags' => [""],
            'content' => "",
            'passion_level' => 1,
        ],
        [
            'id' => 5,
            'user_name' => "栃木太郎",
            'title' => "Next.jsについて学ぼう",
            'created_at' => "2022-01-01T01:41:28.000000Z",
            'tags' => ["Next.js", "勉強会"],
            'content' => "Next.js何もわからん人向け",
            'passion_level' => 2,
        ],
        [
            'id' => 6,
            'user_name' => "名無し",
            'title' => "Laravel初心者さんいらっしゃい",
            'created_at' => "2022-01-01T01:41:28.000000Z",
            'tags' => ["Laravel", "初心者", "ハンズオン"],
            'content' => "Laravel初心者さんいらっしゃい。ゆっくりしていってね",
            'passion_level' => 3,
        ],
    ]);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
