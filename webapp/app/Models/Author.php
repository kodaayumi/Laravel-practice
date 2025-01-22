<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    // authorsテーブル対応
    protected $table = 'authors';

    //マスアサインメントを許可するカラムの指定
    protected $fillable = [
        'author_name'
    ];

    //リレーション
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
