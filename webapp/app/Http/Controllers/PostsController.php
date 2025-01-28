<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Author;

use DB;
use Log;

class PostsController extends Controller
{
    //URLアクセス時、投稿データを取得してリスト表示
    public function index() {
        $model = new Post();
        $posts = $model->getPosts();
        return view
        ('index', ['posts' => $posts]);
    }

    //新規投稿作成画面を表示させる
    public function showCreate() {
        $authors = Author::all();
        return view('create', ['authors' => $authors]);
    }

    //新規投稿内容をDBに保存(成功したらリスト画面に戻る/失敗したらエラーメッセージ表示の上リスト画面に戻る)
    public function storePost(Request $request) {
        $model = new Post();
        try {
            DB::beginTransaction();
            $model->storePost($request);
            DB::commit();
        } catch (\Exception $e) {
            Log::error($e);
            DB::rollBack();
            return redirect()
            ->route('index')
            ->with('error', '投稿に失敗しました');
        }
        return redirect()->route('index');
    }

    //投稿内容を編集するための画面を表示させる(投稿idが存在しない場合はエラーメッセージを表示)
    public function showEdit($id) {
        $post = Post::find($id);
        if ($post === null) {
            return redirect()
            ->route('index')
            ->with('error', '404 投稿が存在しません');
        }
        $authors = Author::all();
        return view ('edit', [
            'post' => $post,
            'authors' => $authors
        ]);
    }

    //投稿内容を更新する(成功したらリスト画面に戻る/失敗したらエラーメッセージ表示の上リスト画面に戻る)
    public function registEdit(Request $request, $id)
    {
        $model = new Post();
        try {
            DB::beginTransaction();
            $model->updatePost($request, $id);
            DB::commit();
        } catch (\Exception $e) {
            Log::error($e);
            DB::rollBack();
            return redirect()
            ->route('index')
            ->with('error', '編集に失敗しました');
        }
        return redirect()->route('index');
    }

    //投稿を削除する(成功したらリスト画面に戻る/失敗したらエラーメッセージ表示の上リスト画面に戻る)
    public function deletePost($id) {
        $model = new Post();
        try {
            DB::beginTransaction();
            $model->deletePost($id);
            DB::commit();
        } catch (\Exception $e) {
            Log::error($e);
            DB::rollBack();
            return redirect()
            ->route('index')
            ->with('error', '削除に失敗しました');
        }
        return redirect()->route('index');
    }

    // // 課題3
    // public function index() {
    //     return view('index');
    // }

    // // 課題6
    // public function show() {
    //     $title = "詳細画面";
    //     return view('show', ['title' => $title]);
    // }
}
