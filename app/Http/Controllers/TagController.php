<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $count = $request->input('count');

        // countが指定されていない場合は全権件取得
        if (empty($count)) {
            $tags = Tag::select('id', 'name')->orderBy('updated_at', 'desc')->get();
            return response()->json($tags);
        }
        $tags = Tag::select('id', 'name')->orderBy('updated_at', 'desc')->limit($count)->get();
        return response()->json($tags);
    }
}
