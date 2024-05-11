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
        'tags' => [
            "もくもく会", "勉強会", "React", "Next.js", "Vue", "Nuxt.js", "Javascript", "Typescript", "Python", "Java", "Go", "Laravel", "自然言語処理", "機械学習", "英会話", "数学"
        ]
    ]);
});

// （TOP）セッション一覧
Route::get('/sessions', function () {
    return response()->json([
        [
            'id' => 1,
            'userName' => null,
            'title' => null,
            'created_at' => "2022-01-01T01:41:28.000000Z",
            'tags' => null,
            'content' => null,
            'passionLevel' => 1,
        ],
        [
            'id' => 2,
            'userName' => "山田　太郎",
            'title' => "もくもく会しましょう",
            'created_at' => "2022-01-01T01:41:28.000000Z",
            'tags' => ["もくもく会"],
            'content' => "ジャンルはなんでもOKです。もくもく会に参加できる方募集中",
            'passionLevel' => 2,
        ],
        [
            'id' => 3,
            'userName' => "山田　花子",
            'title' => "Typescript勉強会",
            'created_at' => "2022-01-01T01:41:28.000000Z",
            'tags' => ["Typescript", "勉強会"],
            'content' => "Typescriptについて勉強しましょう。",
            'passionLevel' => 3,
        ],
        [
            'id' => 4,
            'userName' => "",
            'title' => "",
            'created_at' => "2022-01-01T01:41:28.000000Z",
            'tags' => [""],
            'content' => "",
            'passionLevel' => 1,
        ],
        [
            'id' => 5,
            'userName' => "栃木太郎",
            'title' => "Next.jsについて学ぼう",
            'created_at' => "2022-01-01T01:41:28.000000Z",
            'tags' => ["Next.js", "勉強会"],
            'content' => "Next.js何もわからん人向け",
            'passionLevel' => 2,
        ],
        [
            'id' => 6,
            'userName' => "名無し",
            'title' => "Laravel初心者さんいらっしゃい",
            'created_at' => "2022-01-01T01:41:28.000000Z",
            'tags' => ["Laravel", "初心者", "ハンズオン"],
            'content' => "Laravel初心者さんいらっしゃい。ゆっくりしていってね",
            'passionLevel' => 3,
        ],
    ]);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
