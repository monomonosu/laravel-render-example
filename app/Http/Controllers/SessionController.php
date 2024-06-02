<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    /**
     * TODO:ダミーデータなので実データを返す様に修正する
     * Display a listing of the sessions.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
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
                'passion_level' => 3,
            ],
            [
                'id' => 3,
                'user_name' => "山田　花子",
                'title' => "Typescript勉強会",
                'created_at' => "2022-01-01T01:41:28.000000Z",
                'tags' => ["Typescript", "勉強会"],
                'content' => "Typescriptについて勉強しましょう。",
                'passion_level' => 2,
            ],
            [
                'id' => 4,
                'user_name' => "",
                'title' => "",
                'created_at' => "2022-01-01T01:41:28.000000Z",
                'tags' => [""],
                'content' => "",
                'passion_level' => 2,
            ],
            [
                'id' => 5,
                'user_name' => "栃木太郎",
                'title' => "Next.jsについて学ぼう",
                'created_at' => "2022-01-01T01:41:28.000000Z",
                'tags' => ["Next.js", "勉強会"],
                'content' => "Next.js何もわからん人向け",
                'passion_level' => 3,
            ],
            [
                'id' => 6,
                'user_name' => "名無し",
                'title' => "Laravel初心者さんいらっしゃい",
                'created_at' => "2022-01-01T01:41:28.000000Z",
                'tags' => ["Laravel", "初心者", "ハンズオン"],
                'content' => "Laravel初心者さんいらっしゃい。ゆっくりしていってね",
                'passion_level' => 1,
            ],
        ]);
    }

    /**
     * TODO:ダミーデータなので実データを返す様に修正する
     * Display the specified session.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        return response()->json([
            'id' => $id,
            'title' => "Next.jsについて学ぼう" . $id,
            'user_name' => "栃木太郎" . $id,
            'tags' => ["Next.js", "勉強会"],
            'platform' => 'GoogleMeet',
            'url' => 'https://meet.google.com/xxx-xxx-xxx',
            'passion_level' => 2,
            'content' => "Next.js何もわからん人向け" . $id,
            'created_at' => "2022-01-01T01:41:28.000000Z",
        ]);
    }
}
