<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //ファクトリ機能を使えるようにする
    use HasFactory;

    //マスアサインメントの制御(セキュリティ面/攻撃者が予期しないデータを操作するリスクの軽減)
    protected $fillable = [
        'title',
        'author_id',
        'content',
    ];

    //postテーブルとauthorテーブルを結合して取得、結果をpostsに格納
    public function getPosts() {
        $posts = self::join('authors', 'posts.author_id', '=', 'authors.id')
        ->select('posts.*', 'authors.author_name')
        ->get();
        return $posts;
    }

    //新しい投稿のレコードをDBに保存
    public function storePost($request) {
        self::create([
            'title' => $request->input('title'),
            'author_id' => $request->input('author_id'), //author_id,
            'content' => $request->input('content'), //content
        ]);
    }

    //postsテーブルのレコードを更新(id検索しレコードを更新、DBに反映させる)
    public function updatePost($request, $id) {
        self::where('id', '=', $id)
        ->update([
            'title' => $request->input('title'),
            'author_id' => $request->input('author_id'), //author_id,
            'content' => $request->input('content'), //content
        ]);
    }

    //postsテーブルのレコードを削除
    public function deletePost($id){
        self::where('id', '=', $id)
        ->delete();
    }

    // //postsテーブル対応
    // protected $table = 'posts';

    // //マスアサインメントを許可するカラムの指定
    // protected $fillable = [
    //     'author_id',
    //     'title',
    //     'content',
    // ];
    
    // //リレーション
    // public function author()
    // {
    //     return $this->belongsTo(User::class, 'author_id');
    // }
}
