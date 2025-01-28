<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Author;
use Illuminate\Support\Facades\DB;

class AuthorsTableSeeder extends Seeder
{
    public function run()
    {
        // 既存の空のデータを削除
        DB::table('authors')->where('author_name', '')->delete();

        // 新しい著者データを追加
        Author::create(['author_name' => '織田信長']);
        Author::create(['author_name' => '豊臣秀吉']);
        Author::create(['author_name' => '徳川家康']);
    }
}