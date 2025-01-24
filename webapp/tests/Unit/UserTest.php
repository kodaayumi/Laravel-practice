<?php

namespace Tests\Unit;

use Tests\TestCase;

class UserTest extends TestCase
{
    //ユーザー新規登録のテスト
    public function testUserRegistration()
    {
        // テスト用のユーザーデータを作成
        $userData = [
            'name' => 'テストユーザー',
            'email' => 'test@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ];

        // ユーザーを登録
        $response = $this->post('/register', $userData);

        // リダイレクトが発生した場合の確認
        $response->dump(); // ここでレスポンスの内容を確認
    
        // ステータスコードが302であることを確認（リダイレクト）
        $response->assertStatus(302);
    
        // リダイレクト先を確認
        $response->assertRedirect('http://localhost/dashboard');
} 
    }