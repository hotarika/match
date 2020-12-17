<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use Illuminate\Support\Facades\Auth;

class LoginFormTest extends TestCase
{
    use RefreshDatabase;

    // *******************************************
    // 全体確認
    // *******************************************
    /**
     * @test
     * [正常値] ログイン
     * */
    public function login_user_true()
    {
        factory(User::class)->create([
            'name' => 'test1',
            'email' => 'test1@example.com',
            'password' => bcrypt('rootroot'),
        ]);

        // ログインしていないことを確認
        $this->assertFalse(Auth::check());

        $response = $this->post('login', [
            'email' => 'test1@example.com',
            'password' => 'rootroot'
        ]);

        // ログインしていることを確認
        $this->assertTrue(Auth::check());
        $response->assertRedirect('mypage');
    }

    /**
     * @test
     * [異常値] ログインの空値
     * */
    public function login_user_false()
    {
        $response = $this->post('login', [
            'email' => null,
            'password' => null
        ]);

        $error_email = session('errors')->first('email');
        $this->assertEquals('メールアドレスは必ず指定してください。', $error_email);

        $error_pass = session('errors')->first('password');
        $this->assertEquals('パスワードは必ず指定してください。', $error_pass);
    }

    // *******************************************
    // メールアドレス
    // *******************************************
    /**
     * @test
     * メールアドレスが入力、パスワードが未入力の場合
     * */
    public function login_user_enter_email_only()
    {
        factory(User::class)->create([
            'name' => 'test1',
            'email' => 'test1@example.com',
            'password' => bcrypt('rootroot'),
        ]);

        $response = $this->post('login', [
            'email' => 'test1@example.com',
            'password' => null
        ]);

        // メールアドレスだけ入力している場合はそのメールが合っていても間違っていてもエラーは出さない
        // パスワードを入力した段階でエラーを出力する
        $error_email = session('errors')->first('email');
        $this->assertEmpty($error_email);
    }

    /**
     * @test
     * [異常系] メールアドレスが有効、パスワードが無効の場合
     * */
    public function login_user_valid_email_false()
    {
        factory(User::class)->create([
            'name' => 'test1',
            'email' => 'test1@example.com',
            'password' => bcrypt('rootroot'),
        ]);

        $response = $this->post('login', [
            'email' => 'test1@example.com',
            'password' => 'rootrootaaa'
        ]);

        $error_email = session('errors')->first('email');
        $this->assertEquals('ログイン情報が登録されていません。', $error_email);
    }

    /**
     * @test
     * [異常系] メールアドレスが無効の場合
     * */
    public function login_user_invalid_email_false()
    {
        factory(User::class)->create([
            'name' => 'test1',
            'email' => 'test1@example.com',
            'password' => bcrypt('rootroot'),
        ]);

        $response = $this->post('login', [
            'email' => 'test11111@example.com',
            'password' => 'rootroot'
        ]);

        $error_email = session('errors')->first('email');
        $this->assertEquals('ログイン情報が登録されていません。', $error_email);
    }
}
