<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ParentPublicMessagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parent_public_messages')->insert([
            'work_id' => 1,
            'user_id' => 2,
            'title' => 'parent_id1のタイトル',
            'content' => 'id2がwork1のパブリックメッセージに投稿しました。パブリックメッセージの質問内容が入ります。パブリックメッセージの質問内容が入ります。パブリックメッセージの質問内容が入ります。パブリックメッセージの質問内容が入ります。パブリックメッセージの質問内容が入ります。パブリックメッセージの質問内容が入ります。パブリックメッセージの質問内容が入ります。パブリックメッセージの質問内容が入ります。パブリックメッセージの質問内容が入ります。パブリックメッセージの質問内容が入ります。',
            'created_at' => '2020-10-04 12:44:57',
            'updated_at' => '2020-10-04 12:44:57',
        ]);
        DB::table('parent_public_messages')->insert([
            'work_id' => 1,
            'user_id' => 3,
            'title' => 'parent_id2のタイトル',
            'content' => 'id3がwork1のパブリックメッセージに投稿しました。パブリックメッセージの質問内容が入ります。パブリックメッセージの質問内容が入ります。パブリックメッセージの質問内容が入ります。パブリックメッセージの質問内容が入ります。パブリックメッセージの質問内容が入ります。パブリックメッセージの質問内容が入ります。パブリックメッセージの質問内容が入ります。パブリックメッセージの質問内容が入ります。パブリックメッセージの質問内容が入ります。パブリックメッセージの質問内容が入ります。',
            'created_at' => '2020-10-06 15:44:57',
            'updated_at' => '2020-10-06 15:44:57'
        ]);
        DB::table('parent_public_messages')->insert([
            'work_id' => 2,
            'user_id' => 4,
            'title' => 'parent_id3のタイトル',
            'content' => 'id4がwork2のパブリックメッセージに投稿しました。パブリックメッセージの質問内容が入ります。パブリックメッセージの質問内容が入ります。パブリックメッセージの質問内容が入ります。パブリックメッセージの質問内容が入ります。パブリックメッセージの質問内容が入ります。パブリックメッセージの質問内容が入ります。パブリックメッセージの質問内容が入ります。パブリックメッセージの質問内容が入ります。パブリックメッセージの質問内容が入ります。パブリックメッセージの質問内容が入ります。',
            'created_at' => '2020-11-09 11:43:47',
            'updated_at' => '2020-11-09 11:43:47'
        ]);
        DB::table('parent_public_messages')->insert([
            'work_id' => 2,
            'user_id' => 1,
            'title' => 'parent_id4のタイトル',
            'content' => 'id1がwork2のパブリックメッセージに投稿しました。パブリックメッセージの質問内容が入ります。パブリックメッセージの質問内容が入ります。パブリックメッセージの質問内容が入ります。パブリックメッセージの質問内容が入ります。パブリックメッセージの質問内容が入ります。パブリックメッセージの質問内容が入ります。パブリックメッセージの質問内容が入ります。パブリックメッセージの質問内容が入ります。パブリックメッセージの質問内容が入ります。パブリックメッセージの質問内容が入ります。',
            'created_at' => '2020-12-02 11:40:57',
            'updated_at' => '2020-12-02 11:40:57',
        ]);

        // チェック
        DB::table('parent_public_messages')->insert([
            'work_id' => 1,
            'user_id' => 1,
            'title' => 'あああああああああああああああああああああああああああああああああああああああああ',
            'content' => 'ああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああ',
            'created_at' => '2020-12-02 11:40:57',
            'updated_at' => '2020-12-02 11:40:57',
        ]);

        DB::table('parent_public_messages')->insert([
            'work_id' => 1,
            'user_id' => 1,
            'title' => 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa',
            'content' => 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa',
            'created_at' => '2020-12-03 11:40:57',
            'updated_at' => '2020-12-03 11:40:57',
        ]);
    }
}
