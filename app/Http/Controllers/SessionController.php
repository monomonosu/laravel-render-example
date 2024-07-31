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
        if (empty($session)) {
            return response()->json(['message' => 'Not Found'], 404);
        }
        $session->makeHidden('password');

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

    /**
     * Update the specified session in storage.
     * 入力されたパスワードが保存されているパスワードと一致する場合のみ更新を許可する
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $session = Session::find($id);
        if (empty($session)) {
            return response()->json(['message' => 'Not Found'], 404);
        }

        if ($session->password !== $request->input('password')) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

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
        $session->tags()->sync($tagIds);

        return response()->json($session);
    }

    /**
     * Remove the specified session from storage.
     * 入力されたパスワードが保存されているパスワードと一致する場合のみ削除を許可する
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request,$id)
    {
        $session = Session::find($id);
        if (empty($session)) {
            return response()->json(['message' => 'Not Found'], 404);
        }

        if ($session->password !== $request->input('password')) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $session->delete();

        return response()->json(['message' => 'Deleted']);
    }
}
