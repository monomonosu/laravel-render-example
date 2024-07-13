<?php

namespace App\Http\Controllers;

use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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

        $sessions = Session::with('tags:id,name')->orderBy('created_at', 'desc')->paginate($PER_PAGE, ['*'], 'page', $page);

        return response()->json([
            'items' => $sessions->items(),
            'total' => $sessions->total(),
            'per_page' => $sessions->perPage(),
            'current_page' => $sessions->currentPage(),
            'last_page' => $sessions->lastPage(),
        ]);

    }

    /**
     * Display the specified session.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $session = Session::with('tags:id,name')->find($id);

        return response()->json($session);
    }

    /**
     * Store a newly created session in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $session = new Session();
        $session->user_name = $request->input('user_name');
        $session->title = $request->input('title');
        $session->platform = $request->input('platform');
        $session->url = $request->input('url');
        $session->password = $request->input('password');
        $session->passion_level = $request->input('passion_level');
        $session->content = $request->input('content');
        $session->save();

        return response()->json($session);
    }
}
