<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //ファクトリ機能を使えるようにする
    use HasFactory;

    //postsテーブル対応
    protected $table = 'posts';

    //マスアサインメントを許可するカラムの指定
    protected $fillable = [
        'author_id',
        'title',
        'content',
    ];
    
    //リレーション
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
