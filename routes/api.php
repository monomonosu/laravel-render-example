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

Route::get('/tags',function(){
    return response()->json([
        ['tags' => [
            "もくもく会","勉強会","React","Next.js","Vue","Nuxt.js","Javascript","Typescript","Python","Java","Go","Laravel","自然言語処理","機械学習","英会話","数学"
        ]]
    ]);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
