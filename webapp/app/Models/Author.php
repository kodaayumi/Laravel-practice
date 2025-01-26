<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Author extends Model
{
    use HasFactory;

    //マスアサインメントを許可するカラムの指定
    protected $fillable = [
        'author_name'
    ];

    //リレーション
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
