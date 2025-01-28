<?php

namespace Tests\Unit;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    //ユーザー新規登録のテスト
        //テストごとにDBをリセット
        use RefreshDatabase;

        /** @test **/
        //正常なレスポンスを返す
        public function user_can_register_successfully()
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

        //ステータスコードが302であることを確認
        $response->assertStatus(302);

        //ダッシュボードへリダイレクトされることを確認
        $response->assertRedirect(route('dashboard'));

        //データベースにユーザーが保存されていることを確認
        $this->assertDatabaseHas('users', [
            'email' => 'test@example.com',
        ]);

        //認証されていることを確認
        $this->assertAuthenticated();
        }

        /** @test */
        //名前を入力しないと登録できない
        public function registration_fails_when_name_is_missing()
        {
        $userData = [
            'name' => '',
            'email' => 'test@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ];
        $response = $this->post('/register', $userData);

        $response->asserStatus(302);
        $response->assertSessionHasErrors('name');
        }

        /** @test */
        //無効なメールアドレスは登録できない
        public function registration_fails_when_invalid_email_is_provided()
        {
        $userData = [
            'name' => 'テストユーザー',
            'email' => 'e-mail',//無効
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ];
        $response = $this->post('/register', $userData);
        $response->assertStatus(302);
        $response->assertSessionHasErrors('email');
        }

        /** @test */
        //パスワードが短すぎると登録できない
        public function registration_fails_when_password_is_too_short()
        {
        $userData = [
            'name' => 'テストユーザー',
            'email' => 'test@example.com',
            'password' => '12',//短すぎる
            'password_confirmation' => '12',
        ];
        $response = $this->post('/register', $userData);
        $response->assertStatus(302);
        $response->assertSessionHasErrors('password');
        }
}