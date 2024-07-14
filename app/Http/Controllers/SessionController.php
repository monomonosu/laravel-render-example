<?php

namespace App\Http\Controllers;

use App\Models\Session;
use App\Models\Tag;
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
     * リレーション先のタグも登録する。もしもタグが存在しない場合は新規登録する。tagsは[{id:'1',name: 'tag1'}, {id:null,name: 'tag2'}]の形式で受け取る
     * タグのidがnullの場合はタグを新規登録してセッションに紐付け、タグのidが存在する場合はそのidをセッションに紐付ける
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $session = new Session();
        $session->fill($request->all());
        $session->save();

        $tags = $request->input('tags', []);
        $tagIds = [];
        foreach ($tags as $tag) {
            if (empty($tag['id'])) {
                $newTag = new Tag();
                $newTag->name = $tag['name'];
                $newTag->save();
                $tagIds[] = $newTag->id;
            } else {
                $tagIds[] = $tag['id'];
            }
        }
        $session->tags()->attach($tagIds);

        return response()->json($session);
    }
}
