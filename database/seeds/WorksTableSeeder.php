<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class WorksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('works')->insert([
            'user_id' => 1,
            'name' => '1.タブレット専用端末のアプリ開発 Android＆iPhone・iPadアプリ開発の仕事の依頼となります',
            'contract_id' => 1,
            'end_date' => '2021/04/28',
            'hope_date' => '2021/06/12',
            'price_lower' => 800,
            'price_upper' => 1000,
            'content' => '仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。',
            'created_at' => '2020-10-03 12:44:57',
            'updated_at' => '2020-10-03 12:44:57'
        ]);
        DB::table('works')->insert([
            'user_id' => 2,
            'name' => '2.【フルリモート案件/継続依頼あり】SaaS開発エンジニア募集！ フロントエンド/バックエンド/React',
            'contract_id' => 2,
            'end_date' => '2021/05/22',
            'hope_date' => '2021/12/28',
            'content' => '仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。',
            'created_at' => '2020-10-04 12:44:57',
            'updated_at' => '2020-10-04 12:44:57'
        ]);
        DB::table('works')->insert([
            'user_id' => 3,
            'name' => '3.店舗オーナーに向けた集客用ウェブサイトの構築',
            'contract_id' => 1,
            'end_date' => '2021/01/10',
            'hope_date' => '2021/04/28',
            'price_lower' => 500,
            'price_upper' => 1000,
            'content' => '仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。',
            'created_at' => '2020-11-07 12:44:57',
            'updated_at' => '2020-11-07 12:44:57'
        ]);
        DB::table('works')->insert([
            'user_id' => 4,
            'name' => '4.Wordpressを使用したフロントエンドコーディング',
            'contract_id' => 1,
            'end_date' => '2021/01/10',
            'hope_date' => '2021/04/28',
            'price_lower' => 600,
            'price_upper' => 900,
            'content' => '仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。',
            'created_at' => '2020-11-10 12:44:57',
            'updated_at' => '2020-11-10 12:44:57'
        ]);
        DB::table('works')->insert([
            'user_id' => 1,
            'name' => '5.自社ホームページ作成依頼',
            'contract_id' => 2,
            'end_date' => '2021/01/11',
            'hope_date' => '2021/04/28',
            'content' => '仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。',
            'created_at' => '2020-11-11 12:44:57',
            'updated_at' => '2020-11-1 12:44:57'
        ]);
        DB::table('works')->insert([
            'user_id' => 2,
            'name' => '6.既存サイトのレスポンシブ化＆フルリニューアル（および継続運用）パートナー',
            'contract_id' => 1,
            'end_date' => '2021/01/22',
            'hope_date' => '2021/04/18',
            'price_lower' => 600,
            'price_upper' => 900,
            'content' => '仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。',
            'created_at' => '2020-11-12 12:44:57',
            'updated_at' => '2020-11-12 12:44:57'
        ]);
        DB::table('works')->insert([
            'user_id' => 3,
            'name' => '7.マッチングサイトの制作',
            'contract_id' => 2,
            'end_date' => '2021/01/15',
            'hope_date' => '2021/03/28',
            'content' => '仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。',
            'created_at' => '2020-11-15 12:44:57',
            'updated_at' => '2020-11-15 12:44:57'
        ]);
        DB::table('works')->insert([
            'user_id' => 5,
            'name' => '8.既存サイトに追加したかたちの新規HP作成依頼',
            'contract_id' => 1,
            'end_date' => '2021/01/10',
            'hope_date' => '2021/04/06',
            'price_lower' => 1000,
            'price_upper' => 1000,
            'content' => '仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。',
            'created_at' => '2020-11-23 12:44:57',
            'updated_at' => '2020-11-23 12:44:57'
        ]);
        DB::table('works')->insert([
            'user_id' => 5,
            'name' => 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa',
            'contract_id' => 1,
            'end_date' => '2021/01/10',
            'hope_date' => '2021/04/06',
            'price_lower' => 1000,
            'price_upper' => 1000,
            'content' => 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa',
            'created_at' => '2020-11-24 12:44:57',
            'updated_at' => '2020-11-24 12:44:57'
        ]);
        DB::table('works')->insert([
            'user_id' => 5,
            'name' => 'ああああああああああああああああああああああああああああああああああああああああ',
            'contract_id' => 1,
            'end_date' => '2021/01/10',
            'hope_date' => '2021/04/06',
            'price_lower' => 1000,
            'price_upper' => 1000,
            'content' => 'ああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああ',
            'created_at' => '2020-11-25 12:44:57',
            'updated_at' => '2020-11-25 12:44:57'
        ]);
        DB::table('works')->insert([
            'user_id' => 5,
            'name' => 'タイトルが入りますタイトルが入りますタイトルが入りますタイトルが入ります',
            'contract_id' => 2,
            'end_date' => '2021/01/10',
            'hope_date' => '2021/04/06',
            'content' => '内容が入ります内容が入ります内容が入ります内容が入ります内容が入ります内容が入ります内容が入ります内容が入ります内容が入ります内容が入ります内容が入ります内容が入ります内容が入ります内容が入ります内容が入ります内容が入ります内容が入ります内容が入ります内容が入ります内容が入ります内容が入ります内容が入ります内容が入ります内容が入ります内容が入ります内容が入ります内容が入ります内容が入ります内容が入ります',
            'created_at' => '2020-11-26 12:44:57',
            'updated_at' => '2020-11-26 12:44:57'
        ]);
    }
}
