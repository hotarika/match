<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ProfileFormTest extends TestCase
{
    use RefreshDatabase;

    // *******************************************
    // 全体確認
    // *******************************************
    /**
     * @test
     * [正常値] プロフィール編集
     * */
    public function profile_true()
    {
        // Auth ---------------------------------
        $user = factory(User::class)->create();
        $this->actingAs($user);
        // --------------------------------------

        $data = [
            'name' => 'test',
            'email' => 'test@example.com',
            'introduction' => 'こんにちは'
        ];
        // DB挿入
        $response = $this->put(route('users.update', $user->id), $data);
        // DBに挿入されているかチェック
        $this->assertDatabaseHas('users', $data);
    }

    /**
     * @test
     * [異常値] 空値
     * */
    public function profile_null_false()
    {
        // Auth ---------------------------------
        $user = factory(User::class)->create();
        $this->actingAs($user);
        // --------------------------------------

        $response = $this
            ->put(route('users.update', $user->id), [
                'name' => null,
                'email' => null,
                'introduction' => null
            ]);

        $error = session('errors')->first('name');
        $this->assertEquals('名前は必ず指定してください。', $error);
        $error = session('errors')->first('email');
        $this->assertEquals('メールアドレスは必ず指定してください。', $error);
    }

    // *******************************************
    // 画像
    // *******************************************
    /**
     * @test
     * [正常値] 画像 / 最大サイズ
     * */
    public function profile_image_max_size_true()
    {
        // Auth ---------------------------------
        $user = factory(User::class)->create();
        $this->actingAs($user);
        // --------------------------------------

        $file = UploadedFile::fake()->image('avatar.jpg')->size(1024);
        $data = ['image' => $file];

        // DB挿入
        $response = $this->put(route('users.update', $user->id), $data);

        $error = session('errors')->first('image');
        $this->assertEmpty($error);
    }
    /**
     * @test
     * [異常値] 画像 / 最大サイズ
     * */
    public function profile_image_max_size_false()
    {
        // Auth ---------------------------------
        $user = factory(User::class)->create();
        $this->actingAs($user);
        // --------------------------------------

        $file = UploadedFile::fake()->image('avatar.jpg')->size(1025);
        $data = ['image' => $file];

        // DB挿入
        $response = $this->put(route('users.update', $user->id), $data);

        $error = session('errors')->first('image');
        $this->assertEquals('画像には、1024 kB以下のファイルを指定してください。', $error);
    }
    /**
     * @test
     * [異常値] 画像 / 最大サイズ
     * */
    public function profile_image_mime_true()
    {
        // Auth ---------------------------------
        $user = factory(User::class)->create();
        $this->actingAs($user);
        // --------------------------------------

        // 全てのmimesをテスト
        $mimes = ['jpeg', 'jpg', 'gif', 'svg'];

        foreach ($mimes as $mime) {
            $file = UploadedFile::fake()->image('avatar.' . $mime);
            $data = ['image' => $file];

            // DB挿入
            $response = $this->put(route('users.update', $user->id), $data);

            $error = session('errors')->first('image');
            $this->assertEmpty($error);
        }
    }
    /**
     * @test
     * [異常値] 画像 / 最大サイズ
     * */
    public function profile_image_mime_false()
    {
        // Auth ---------------------------------
        $user = factory(User::class)->create();
        $this->actingAs($user);
        // --------------------------------------

        $file = UploadedFile::fake()->image('avatar.HEIC');
        $data = ['image' => $file];

        // DB挿入
        $response = $this->put(route('users.update', $user->id), $data);

        $error = session('errors')->first('image');
        $this->assertEquals('画像にはjpeg, png, gif, svgタイプのファイルを指定してください。', $error);
    }

    // *******************************************
    // 名前
    // *******************************************
    /**
     * @test
     * [正常値] 最大値チェック（アルファベット）
     * */
    public function profile_name_max_alphabet_true()
    {
        // Auth ---------------------------------
        $user = factory(User::class)->create();
        $this->actingAs($user);
        // --------------------------------------

        $response = $this->put(route('users.update', $user->id), [
            'name' => str_repeat('a', 20),
        ]);

        $error = session('errors')->first('name');
        $this->assertEmpty($error);
    }
    /**
     * @test
     * [異常値] 最大値チェック（アルファベット）
     * */
    public function profile_name_max_alphabet_false()
    {
        // Auth ---------------------------------
        $user = factory(User::class)->create();
        $this->actingAs($user);
        // --------------------------------------

        $response = $this->put(route('users.update', $user->id), [
            'name' => str_repeat('a', 21),
        ]);

        $error = session('errors')->first('name');
        $this->assertEquals('名前は、20文字以内で指定してください。', $error);
    }
    /**
     * @test
     * [正常値] 最大値チェック（日本語）
     * */
    public function profile_name_max_japanese_true()
    {
        // Auth ---------------------------------
        $user = factory(User::class)->create();
        $this->actingAs($user);
        // --------------------------------------

        $response = $this->put(route('users.update', $user->id), [
            'name' => str_repeat('あ', 20),
        ]);

        $error = session('errors')->first('name');
        $this->assertEmpty($error);
    }
    /**
     * @test
     * [異常値] 最大値チェック（日本語）
     * */
    public function profile_name_max_japanese_false()
    {
        // Auth ---------------------------------
        $user = factory(User::class)->create();
        $this->actingAs($user);
        // --------------------------------------

        $response = $this->put(route('users.update', $user->id), [
            'name' => str_repeat('あ', 21),
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
    public function profile_email_format_true()
    {
        // Auth ---------------------------------
        $user = factory(User::class)->create();
        $this->actingAs($user);
        // --------------------------------------

        $response = $this->put(route('users.update', $user->id), [
            'email' => 'test@example.com',
        ]);

        $error = session('errors')->first('email');
        $this->assertEmpty($error);
    }
    /**
     * @test
     * [異常値] メール / フォーマットチェック
     * */
    public function profile_email_format_false()
    {
        // Auth ---------------------------------
        $user = factory(User::class)->create();
        $this->actingAs($user);
        // --------------------------------------

        $response = $this->put(route('users.update', $user->id), [
            'email' => 'testexample.com',
        ]);

        $error = session('errors')->first('email');
        $this->assertEquals('メールアドレスには、有効なメールアドレスを指定してください。', $error);
    }
    /**
     * @test
     * [異常値] メール / フォーマットチェック（日本語）
     * */
    public function profile_email_format_japanese_false()
    {
        // Auth ---------------------------------
        $user = factory(User::class)->create();
        $this->actingAs($user);
        // --------------------------------------

        $response = $this->put(route('users.update', $user->id), [
            'email' => 'あいうえお@example.com',
        ]);

        $error = session('errors')->first('email');
        $this->assertEquals('メールアドレスに正しい形式を指定してください。', $error);
    }
    /**
     * @test
     * [正常値] メール / 文字数チェック
     * */
    public function profile_email_max_true()
    {
        // Auth ---------------------------------
        $user = factory(User::class)->create();
        $this->actingAs($user);
        // --------------------------------------

        $response = $this->put(route('users.update', $user->id), [
            'email' => str_repeat('a', 243) . '@example.com' // 255文字
        ]);

        $error = session('errors')->first('email');
        $this->assertEmpty($error);
    }
    /**
     * @test
     * [異常値] メール / 文字数チェック
     * */
    public function profile_email_max_false()
    {
        // Auth ---------------------------------
        $user = factory(User::class)->create();
        $this->actingAs($user);
        // --------------------------------------

        $response = $this->put(route('users.update', $user->id), [
            'email' => str_repeat('a', 244) . '@example.com' // 256文字
        ]);

        $error = session('errors')->first('email');
        $this->assertEquals('メールアドレスは、255文字以内で指定してください。', $error);
    }

    // *******************************************
    // 自己紹介文
    // *******************************************
    /**
     * @test
     * [正常値] メール / 文字数チェック
     * */
    public function profile_introduction_max_true()
    {
        // Auth ---------------------------------
        $user = factory(User::class)->create();
        $this->actingAs($user);
        // --------------------------------------

        $response = $this->put(route('users.update', $user->id), [
            'introduction' => str_repeat('a', 3000)
        ]);

        $error = session('errors')->first('introduction');
        $this->assertEmpty($error);
    }
    /**
     * @test
     * [異常値] メール / 文字数チェック
     * */
    public function profile_introduction_max_false()
    {
        // Auth ---------------------------------
        $user = factory(User::class)->create();
        $this->actingAs($user);
        // --------------------------------------

        $response = $this->put(route('users.update', $user->id), [
            'introduction' => str_repeat('a', 3001)
        ]);


        $error = session('errors')->first('introduction');
        $this->assertEquals('自己紹介文は、3000文字以内で指定してください。', $error);
    }
    /**
     * @test
     * [正常値] メール / 文字数チェック
     * */
    public function profile_introduction_max_japanese_true()
    {
        // Auth ---------------------------------
        $user = factory(User::class)->create();
        $this->actingAs($user);
        // --------------------------------------

        $response = $this->put(route('users.update', $user->id), [
            'introduction' => str_repeat('あ', 3000)
        ]);

        $error = session('errors')->first('introduction');
        $this->assertEmpty($error);
    }
    /**
     * @test
     * [異常値] メール / 文字数チェック
     * */
    public function profile_introduction_max_japanese_false()
    {
        // Auth ---------------------------------
        $user = factory(User::class)->create();
        $this->actingAs($user);
        // --------------------------------------

        $response = $this->put(route('users.update', $user->id), [
            'introduction' => str_repeat('あ', 3001)
        ]);


        $error = session('errors')->first('introduction');
        $this->assertEquals('自己紹介文は、3000文字以内で指定してください。', $error);
    }
}
