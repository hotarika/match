<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Str;

class RegisterFormTest extends TestCase
{
    use RefreshDatabase;

    // *******************************************
    // 全体確認
    // *******************************************
    /**
     * @test
     * [正常値] 通常の登録
     * */
    public function register_user_true()
    {
        $this->assertFalse(Auth::check());

        $response = $this->post('register', [
            'name' => 'test1',
            'email' => 'test1@example.com',
            'password' => 'rootroot',
            'password_confirmation' => 'rootroot'
        ]);

        $this->assertTrue(Auth::check()); // Auth確認
        $response->assertRedirect('mypage'); // リダイレクト確認
    }

    /**
     * @test
     * [異常値] 空値の入力
     * */
    public function register_empty_false()
    {
        $response = $this->post('register', [
            'name' => null,
            'email' => null,
            'password' => null,
            'password_confirmation' => null
        ]);

        $error_name = session('errors')->first('name');
        $this->assertEquals('名前は必ず指定してください。', $error_name);

        $error_email = session('errors')->first('email');
        $this->assertEquals('メールアドレスは必ず指定してください。', $error_email);

        $error_pass = session('errors')->first('password');
        $this->assertEquals('パスワードは必ず指定してください。', $error_pass);

        $this->assertFalse(Auth::check()); // Auth確認
    }

    // *******************************************
    // 名前チェック
    // *******************************************
    /**
     * @test
     * [正常値] 最大値チェック
     * */
    public function register_name_max_alphabet_true()
    {
        $response = $this->post('register', [
            'name' => str_repeat('a', 20)
        ]);

        $error = session('errors')->first('name');
        $this->assertEmpty($error);
    }
    /**
     * @test
     * [異常値] 最大値チェック
     * */
    public function register_name_max_alphabet_False()
    {
        $response = $this->post('register', [
            'name' => str_repeat('a', 21)
        ]);

        $error = session('errors')->first('name');
        $this->assertEquals('名前は、20文字以内で指定してください。', $error);
    }
    /**
     * @test
     * [正常値] 最大値チェック（日本語）
     * */
    public function register_name_max_japanese_true()
    {
        $response = $this->post('register', [
            'name' => str_repeat('あ', 20)
        ]);

        $error = session('errors')->first('name');
        $this->assertEmpty($error);
    }
    /**
     * @test
     * [異常値] 最大値チェック（日本語）
     * */
    public function register_name_max_japanese_false()
    {
        $response = $this->post('register', [
            'name' => str_repeat('あ', 21)
        ]);

        $error = session('errors')->first('name');
        $this->assertEquals('名前は、20文字以内で指定してください。', $error);
    }

    // *******************************************
    // メールアドレス
    // *******************************************
    /**
     * @test
     * [正常値] メール / フォーマットチェック
     * */
    public function register_email_format_true()
    {
        $response = $this->post('register', [
            'email' => 'test@example.com',
        ]);

        $error = session('errors')->first('email');
        $this->assertEmpty($error);
    }
    /**
     * @test
     * [異常値] メール / フォーマットチェック
     * */
    public function register_email_format_false()
    {
        $response = $this->post('register', [
            'email' => 'testexample.com',
        ]);

        $error = session('errors')->first('email');
        $this->assertEquals('メールアドレスには、有効なメールアドレスを指定してください。', $error);
    }
    /**
     * @test
     * [異常値] メール / フォーマットチェック（日本語）
     * */
    public function register_email_format_japanese_false()
    {
        $response = $this->post('register', [
            'email' => 'あいうえお@example.com',
        ]);

        $error = session('errors')->first('email');
        $this->assertEquals('メールアドレスに正しい形式を指定してください。', $error);
    }
    /**
     * @test
     * [正常値] メール / 文字数チェック
     * */
    public function register_email_max_true()
    {
        $response = $this->post('register', [
            'email' => str_repeat('a', 243) . '@example.com' // 255文字
        ]);

        $error = session('errors')->first('email');
        $this->assertEmpty($error);
    }
    /**
     * @test
     * [異常値] メール / 文字数チェック
     * */
    public function register_email_max_false()
    {
        $response = $this->post('register', [
            'email' => str_repeat('a', 244) . '@example.com' // 256文字
        ]);

        $error = session('errors')->first('email');
        $this->assertEquals('メールアドレスは、255文字以内で指定してください。', $error);
    }
    /**
     * @test
     * [異常値] メール / 重複チェック
     * */
    public function register_email_duplication_false()
    {
        $user = new User;
        $user->fill([
            'name' => 'test',
            'email' => 'test@example.com',
            'password' => 'rootroot',
        ])->save();

        $response = $this->post('register', [
            'name' => 'test',
            'email' => 'test@example.com',
            'password' => 'rootroot',
            'password_confirmation' => 'rootroot'
        ]);

        $error = session('errors')->first('email');
        $this->assertEquals('このメールアドレスは利用することができません。', $error);
    }

    // *******************************************
    // パスワード
    // *******************************************
    /**
     * @test
     * [正常値] パスワード / 文字数チェック（最小値）& パスワード再入力確認
     * */
    public function register_password_min_and_confirmation_true()
    {
        $password = Str::random(8);
        $response = $this->post('register', [
            'password' => $password,
            'password_confirmation' => $password
        ]);

        $error = session('errors')->first('password');
        $this->assertEmpty($error);
    }
    /**
     * @test
     * [異常値] パスワード / 文字数チェック（最小値）
     * */
    public function register_password_min_false()
    {
        $password = Str::random(7);
        $response = $this->post('register', [
            'password' => $password,
        ]);

        $error = session('errors')->first('password');
        $this->assertEquals('パスワードは、8文字以上で指定してください。', $error);
    }
    /**
     * @test
     * [正常値] パスワード / 文字数チェック（最小値）& パスワード再入力確認
     * */
    public function register_password_max_and_confirmation_true()
    {
        $password = Str::random(20);
        $response = $this->post('register', [
            'password' => $password,
            'password_confirmation' => $password
        ]);

        $error = session('errors')->first('password');
        $this->assertEmpty($error);
    }
    /**
     * @test
     * [異常値] パスワード / 文字数チェック（最大値）
     * */
    public function register_password_max_false()
    {
        $password = Str::random(21);
        $response = $this->post('register', [
            'password' => $password,
            'password_confirmation' => $password
        ]);

        $error = session('errors')->first('password');
        $this->assertEquals('パスワードは、20文字以内で指定してください。', $error);
    }
    /**
     * @test
     * [異常値] パスワード / 再入力の確認
     * */
    public function register_password_confirmation_false()
    {
        $response = $this->post('register', [
            'password' => str_repeat('a', 8), // a
            'password_confirmation' => str_repeat('b', 8) // b
        ]);

        $error = session('errors')->first('password');
        $this->assertEquals('パスワードと、確認フィールドとが、一致していません。', $error);
    }
    /**
     * @test
     * [異常値] パスワード / 日本語入力
     * */
    public function register_password_invalid_japanese_false()
    {
        $response = $this->post('register', [
            'password' => str_repeat('あ', 8),
            'password_confirmation' => str_repeat('あ', 8)
        ]);

        $error = session('errors')->first('password');
        $this->assertEquals('パスワードに正しい形式を指定してください。', $error);
    }
    /**
     * @test
     * [異常値] パスワード / 記号入力（*）
     * */
    public function register_password_invalid_signs_false()
    {
        $signs = ['!', '"', '#', '$', '%', '&', '\'', '(', ')', '=', '~', '|', '{', '}', '`', '*', '_', '?', '>', '<', '-', '^', '¥', '[', ']', '@', ':', '_', '/', '.', ',', '<', '>'];

        foreach ($signs as $sign) {
            $response = $this->post('register', [
                'password' => str_repeat($sign, 8),
                'password_confirmation' => str_repeat($sign, 8)
            ]);

            $error = session('errors')->first('password');
            $this->assertEquals('パスワードに正しい形式を指定してください。', $error);
        }
    }
}
