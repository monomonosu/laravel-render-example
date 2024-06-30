<?php

namespace App\Http\Controllers;

use App\Models\Session;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    /**
     * Display a listing of the sessions.
     * @return \Illuminate\Http\JsonResponse
     * @param Request $request
     */
    public function index(Request $request)
    {
        $PER_PAGE = 30;
        $page = $request->input('page', 1);

        $sessions = Session::orderBy('created_at', 'desc')->paginate($PER_PAGE, ['*'], 'page', $page);

        return response()->json([
            'items' => $sessions->items(),
            'total' => $sessions->total(),
            'per_page' => $sessions->perPage(),
            'current_page' => $sessions->currentPage(),
            'last_page' => $sessions->lastPage(),
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
