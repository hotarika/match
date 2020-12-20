<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Work;
use Illuminate\Support\Str;

class WorkFormTest extends TestCase
{
    use RefreshDatabase;

    // *******************************************
    // 全体確認
    // *******************************************
    /**
     * @test
     * [正常値] プロフィール編集（単発案件）
     * */
    public function work_oneoff_true()
    {
        // Auth ---------------------------------
        $user = factory(User::class)->create();
        $this->actingAs($user);
        // --------------------------------------

        $data = [
            'work' => '仕事名が入ります',
            'end_date' => date('Y-m-d', strtotime("1 week")),
            'hope_date' => date('Y-m-d', strtotime("2 week")),
            'contract_id' => 1,
            'price_lower' => 500,
            'price_upper' => 1000,
            'order_content' => '仕事内容が入ります',
        ];
        // DB挿入
        $response = $this->post(route('works.store'), $data)
            ->assertRedirect('works');;

        // DBに挿入されているかチェック
        //（カラム名が挿入時とDBカラム名で違うため、下記のチェックはベタ書き）
        $this->assertDatabaseHas('works', [
            'name' => '仕事名が入ります', // work -> name
            'end_date' => date('Y-m-d', strtotime("1 week")),
            'hope_date' => date('Y-m-d', strtotime("2 week")),
            'contract_id' => 1,
            'price_lower' => 500,
            'price_upper' => 1000,
            'content' => '仕事内容が入ります', // order_content -> content
        ]);
    }

    /**
     * @test
     * [正常値] プロフィール編集（レベニューシェア）
     * */
    public function work_share_true()
    {
        // Auth ---------------------------------
        $user = factory(User::class)->create();
        $this->actingAs($user);
        // --------------------------------------

        $data = [
            'work' => '仕事名が入ります',
            'end_date' => date('Y-m-d', strtotime("1 week")),
            'hope_date' => date('Y-m-d', strtotime("2 week")),
            'contract_id' => 2,
            'order_content' => '仕事内容が入ります',
        ];
        // DB挿入
        $response = $this->post(route('works.store'), $data)
            ->assertRedirect('works');;

        // DBに挿入されているかチェック
        //（カラム名が挿入時とDBカラム名で違うため、下記のチェックはベタ書き）
        $this->assertDatabaseHas('works', [
            'name' => '仕事名が入ります',
            'end_date' => date('Y-m-d', strtotime("1 week")),
            'hope_date' => date('Y-m-d', strtotime("2 week")),
            'contract_id' => 2,
            'content' => '仕事内容が入ります',
        ]);
    }

    /**
     * @test
     * [異常値] プロフィール編集
     * */
    public function work_null_false()
    {
        // Auth ---------------------------------
        $user = factory(User::class)->create();
        $this->actingAs($user);
        // --------------------------------------

        $data = [
            'work' => null,
            'end_date' => null,
            'hope_date' => null,
            'contract_id' => null,
            'order_content' => null,
        ];
        // DB挿入
        $response = $this->post(route('works.store'), $data);

        $error_work = session('errors')->first('work');
        $this->assertEquals('仕事名は必ず指定してください。', $error_work);

        $error_end_date = session('errors')->first('end_date');
        $this->assertEquals('募集終了は必ず指定してください。', $error_end_date);

        $error_hope_date = session('errors')->first('hope_date');
        $this->assertEquals('希望納期は必ず指定してください。', $error_hope_date);

        $error_contract_id = session('errors')->first('contract_id');
        $this->assertEquals('提携方法は必ず指定してください。', $error_contract_id);

        $error_content = session('errors')->first('order_content');
        $this->assertEquals('依頼内容は必ず指定してください。', $error_content);
    }

    /**
     * @test
     * [異常値] プロフィール編集
     * */
    public function work_price_null_true()
    {
        // Auth ---------------------------------
        $user = factory(User::class)->create();
        $this->actingAs($user);
        // --------------------------------------

        $data = [
            'contract_id' => 2, // レベニューシェア
            'price_lower' => null,
            'price_upper' => null,
        ];
        // DB挿入
        $response = $this->post(route('works.store'), $data);

        $error_lower = session('errors')->first('price_lower');
        $this->assertEmpty($error_lower);

        $error_upper = session('errors')->first('price_upper');
        $this->assertEmpty($error_upper);
    }


    /**
     * @test
     * [異常値] プロフィール編集
     * */
    public function work_price_null_false()
    {
        // Auth ---------------------------------
        $user = factory(User::class)->create();
        $this->actingAs($user);
        // --------------------------------------

        $data = [
            'contract_id' => 1, // 単発案件
            'price_lower' => null,
            'price_upper' => null,
        ];
        // DB挿入
        $response = $this->post(route('works.store'), $data);

        $error_lower = session('errors')->first('price_lower');
        $this->assertEquals('提携方法が「単発案件」の場合、下限金額も指定してください。', $error_lower);

        $error_upper = session('errors')->first('price_upper');
        $this->assertEquals('提携方法が「単発案件」の場合、上限金額も指定してください。', $error_upper);
    }

    // *******************************************
    // 仕事名
    // *******************************************
    /**
     * @test
     * [正常値] 仕事名最大値
     * */
    public function work_name_max_true()
    {
        // Auth ---------------------------------
        $user = factory(User::class)->create();
        $this->actingAs($user);
        // --------------------------------------

        // DB挿入
        $data = ['work' => Str::random(60)];
        $response = $this->post(route('works.store'), $data);

        $error = session('errors')->first('work');
        $this->assertEmpty($error);
    }
    /**
     * @test
     * [異常値] 仕事名最大値
     * */
    public function work_name_max_false()
    {
        // Auth ---------------------------------
        $user = factory(User::class)->create();
        $this->actingAs($user);
        // --------------------------------------

        // DB挿入
        $data = ['work' => Str::random(61),];
        $response = $this->post(route('works.store'), $data);

        $error = session('errors')->first('work');
        $this->assertEquals('仕事名は、60文字以内で指定してください。', $error);
    }

    // *******************************************
    // 募集終了
    // *******************************************
    /**
     * @test
     * [正常値] 本日の次の日を指定
     * */
    public function work_end_date_true()
    {
        // Auth ---------------------------------
        $user = factory(User::class)->create();
        $this->actingAs($user);
        // --------------------------------------

        // DB挿入
        $data = ['end_date' => date('Y-m-d', strtotime("1 day"))];
        $response = $this->post(route('works.store'), $data);

        $error = session('errors')->first('end_date');
        $this->assertEmpty($error);
    }

    /**
     * @test
     * [異常値] 本日を指定
     * */
    public function work_end_date_false()
    {
        // Auth ---------------------------------
        $user = factory(User::class)->create();
        $this->actingAs($user);
        // --------------------------------------

        // DB挿入
        $data = ['end_date' => date('Y-m-d')];
        $response = $this->post(route('works.store'), $data);

        $error = session('errors')->first('end_date');
        $this->assertEquals('募集終了には、' . date('Y/m/d') . 'より後の日付を指定してください。', $error);
    }

    /**
     * @test
     * [正常値] フォーマット
     * */
    public function work_end_date_format_true()
    {
        // Auth ---------------------------------
        $user = factory(User::class)->create();
        $this->actingAs($user);
        // --------------------------------------

        // DB挿入
        $data = ['end_date' => date('Y/m/d', strtotime("1 day"))];
        $response = $this->post(route('works.store'), $data);

        $error = session('errors')->first('end_date');
        $this->assertEmpty($error);
    }

    /**
     * @test
     * [異常値] フォーマット
     * */
    public function work_end_date_format_false()
    {
        // Auth ---------------------------------
        $user = factory(User::class)->create();
        $this->actingAs($user);
        // --------------------------------------

        // DB挿入
        $data = ['end_date' => '20/05/02'];
        $response = $this->post(route('works.store'), $data);

        $error = session('errors')->first('end_date');
        $this->assertEquals('募集終了には有効な日付を指定してください。', $error);
    }

    // *******************************************
    // 希望納期
    // *******************************************
    /**
     * @test
     * [正常値] 募集終了以降の日付を指定
     * */
    public function work_hope_date_true()
    {
        // Auth ---------------------------------
        $user = factory(User::class)->create();
        $this->actingAs($user);
        // --------------------------------------

        // DB挿入
        $data = [
            'end_date' => date('Y-m-d', strtotime("1 day")),
            'hope_date' => date('Y-m-d', strtotime("2 day"))
        ];
        $response = $this->post(route('works.store'), $data);

        $error = session('errors')->first('hope_date');
        $this->assertEmpty($error);
    }

    /**
     * @test
     * [異常値] 募集終了の日付と同日
     * */
    public function work_hope_date_false()
    {
        // Auth ---------------------------------
        $user = factory(User::class)->create();
        $this->actingAs($user);
        // --------------------------------------

        // DB挿入
        $data = [
            'end_date' => date('Y-m-d', strtotime("1 day")),
            'hope_date' => date('Y-m-d', strtotime("1 day"))
        ];
        $response = $this->post(route('works.store'), $data);

        $error = session('errors')->first('hope_date');
        $this->assertEquals('希望納期には、募集終了より後の日付を指定してください。', $error);
    }


    // *******************************************
    // 金額
    // *******************************************
    /**
     * @test
     * [正常値] 最大値・最小値テスト
     * */
    public function work_price_true()
    {
        // Auth ---------------------------------
        $user = factory(User::class)->create();
        $this->actingAs($user);
        // --------------------------------------

        // DB挿入
        $data = [
            'contract_id' => 1,
            'price_lower' => 1,
            'price_upper' => 1000
        ];
        $response = $this->post(route('works.store'), $data);

        $error_lower = session('errors')->first('price_lower');
        $this->assertEmpty($error_lower);

        $error_upper = session('errors')->first('price_upper');
        $this->assertEmpty($error_upper);
    }

    /**
     * @test
     * [異常値] 最小値テスト
     * */
    public function work_price_false()
    {
        // Auth ---------------------------------
        $user = factory(User::class)->create();
        $this->actingAs($user);
        // --------------------------------------

        // DB挿入
        $data = [
            'contract_id' => 1,
            'price_lower' => 0,
            'price_upper' => 0
        ];
        $response = $this->post(route('works.store'), $data);

        $error_lower = session('errors')->first('price_lower');
        $this->assertEquals('下限金額には、0 千円より大きな金額を指定してください。', $error_lower);

        $error_upper = session('errors')->first('price_upper');
        $this->assertEquals('上限金額には、0 千円より大きな金額を指定してください。', $error_upper);
    }
    /**
     * @test
     * [正常値] 上限金額・下限金額が同じ場合は、バリデーションをtrue
     * */
    public function work_price_equal_true()
    {
        // Auth ---------------------------------
        $user = factory(User::class)->create();
        $this->actingAs($user);
        // --------------------------------------

        // DB挿入
        $data = [
            'contract_id' => 1,
            'price_lower' => 1000,
            'price_upper' => 1000
        ];
        $response = $this->post(route('works.store'), $data);

        $error_lower = session('errors')->first('price_lower');
        $this->assertEmpty($error_lower);

        $error_upper = session('errors')->first('price_upper');
        $this->assertEmpty($error_upper);
    }
    /**
     * @test
     * [異常値] 最大値テスト
     * */
    public function work_price_max_false()
    {
        // Auth ---------------------------------
        $user = factory(User::class)->create();
        $this->actingAs($user);
        // --------------------------------------

        // DB挿入
        $data = [
            'contract_id' => 1,
            'price_lower' => 1001,
            'price_upper' => 1001
        ];
        $response = $this->post(route('works.store'), $data);

        $error_lower = session('errors')->first('price_lower');
        $this->assertEquals('下限金額には、1000 千円以内の金額を指定してください。', $error_lower);

        $error_upper = session('errors')->first('price_upper');
        $this->assertEquals('上限金額には、1000 千円以内の金額を指定してください。', $error_upper);
    }
    /**
     * @test
     * [異常値] 最大値より最小値の方が大きい場合
     * */
    public function work_price_min_greater_than_max_false()
    {
        // Auth ---------------------------------
        $user = factory(User::class)->create();
        $this->actingAs($user);
        // --------------------------------------

        // DB挿入
        $data = [
            'contract_id' => 1,
            'price_lower' => 600,
            'price_upper' => 500
        ];
        $response = $this->post(route('works.store'), $data);

        $error = session('errors')->first('price_upper');
        $this->assertEquals('上限金額には、下限金額と同じかそれ以上の金額を指定してください。', $error);
    }
    /**
     * @test
     * [異常値] 最大値より最小値の方が大きい場合
     * */
    public function work_price_min_greater_than_max_limit_false()
    {
        // Auth ---------------------------------
        $user = factory(User::class)->create();
        $this->actingAs($user);
        // --------------------------------------

        // DB挿入
        $data = [
            'contract_id' => 1,
            'price_lower' => 1001,
            'price_upper' => 500
        ];
        $response = $this->post(route('works.store'), $data);


        $error_lower = session('errors')->first('price_lower');
        $this->assertEquals('下限金額には、1000 千円以内の金額を指定してください。', $error_lower);

        // 下限金額が1000より大きい場合は、下限金額でエラーが出るので、上限金額ではエラーを出さない
        $error_upper = session('errors')->first('price_upper');
        $this->assertEquals('', $error_upper);
    }


    // *******************************************
    // 依頼内容
    // *******************************************
    /**
     * @test
     * [正常値] 3000文字以内かどうか
     * */
    public function work_content_max_true()
    {
        // Auth ---------------------------------
        $user = factory(User::class)->create();
        $this->actingAs($user);
        // --------------------------------------

        // DB挿入
        $data = ['order_content' => Str::random(3000)];
        $response = $this->post(route('works.store'), $data);

        $error = session('errors')->first('order_content');
        $this->assertEmpty($error);
    }
    /**
     * @test
     * [異常値] 3000文字以内かどうか
     * */
    public function work_content_max_false()
    {
        // Auth ---------------------------------
        $user = factory(User::class)->create();
        $this->actingAs($user);
        // --------------------------------------

        // DB挿入
        $data = ['order_content' => Str::random(3001)];
        $response = $this->post(route('works.store'), $data);

        $error = session('errors')->first('order_content');
        $this->assertEquals('依頼内容は、3000文字以内で指定してください。', $error);
    }
}
