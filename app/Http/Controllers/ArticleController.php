<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article; //Articleをインポート
use App\Http\Requests\StoreArticle; //StoreArticleをインポート

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();

        return response()->json([
            'message' => 'ok',
            'data' => $articles
        ], 200, [], JSON_UNESCAPED_UNICODE);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticle $request)
    {
        $article = Article::create($request->all());

        return response()->json([
            'message' => '作成しました',
            'data' => $article,
        ], 201, [], JSON_UNESCAPED_UNICODE);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);

        return response()->json([
            'message' => 'ok',
            'data' => $article,
        ], 200, [], JSON_UNESCAPED_UNICODE);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreArticle $request, $id)
    {
        $updateData = [
            'title' => $request->title,
            'body' => $request->body,
        ];

        $article = Article::where('id', $id)->update($updateData);
        if ($article) {
            return response()->json([
                'message' => '更新しました',
            ], 200, [], JSON_UNESCAPED_UNICODE);
        } else {
            return response()->json([
                'message' => '更新に失敗しました',
            ], 404, [], JSON_UNESCAPED_UNICODE);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::destroy($id);

        if ($article) {
            return response()->json([
                'message' => '削除しました',
            ], 200, [], JSON_UNESCAPED_UNICODE);
        } else {
            return response()->json([
                'message' => '削除に失敗しました',
            ], 404, [], JSON_UNESCAPED_UNICODE);
        }
    }
}
