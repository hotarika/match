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
            'title' => 'id2がwork1のパブリックメッセージに投稿しました',
            'content' => 'パブリックメッセージの質問内容が入ります。パブリックメッセージの質問内容が入ります。パブリックメッセージの質問内容が入ります。パブリックメッセージの質問内容が入ります。パブリックメッセージの質問内容が入ります。パブリックメッセージの質問内容が入ります。パブリックメッセージの質問内容が入ります。パブリックメッセージの質問内容が入ります。パブリックメッセージの質問内容が入ります。パブリックメッセージの質問内容が入ります。',
            'created_at' => '2020-10-04 12:44:57',
            'updated_at' => '2020-10-04 12:44:57',
        ]);
        DB::table('parent_public_messages')->insert([
            'work_id' => 1,
            'user_id' => 3,
            'title' => 'id3がwork1のパブリックメッセージに投稿しました',
            'content' => 'パブリックメッセージの質問内容が入ります。パブリックメッセージの質問内容が入ります。パブリックメッセージの質問内容が入ります。パブリックメッセージの質問内容が入ります。パブリックメッセージの質問内容が入ります。パブリックメッセージの質問内容が入ります。パブリックメッセージの質問内容が入ります。パブリックメッセージの質問内容が入ります。パブリックメッセージの質問内容が入ります。パブリックメッセージの質問内容が入ります。',
            'created_at' => '2020-10-06 15:44:57',
            'updated_at' => '2020-10-06 15:44:57'
        ]);
        DB::table('parent_public_messages')->insert([
            'work_id' => 2,
            'user_id' => 4,
            'title' => 'id4がwork2のパブリックメッセージに投稿しました',
            'content' => 'パブリックメッセージの質問内容が入ります。パブリックメッセージの質問内容が入ります。パブリックメッセージの質問内容が入ります。パブリックメッセージの質問内容が入ります。パブリックメッセージの質問内容が入ります。パブリックメッセージの質問内容が入ります。パブリックメッセージの質問内容が入ります。パブリックメッセージの質問内容が入ります。パブリックメッセージの質問内容が入ります。パブリックメッセージの質問内容が入ります。',
            'created_at' => '2020-11-09 11:43:47',
            'updated_at' => '2020-11-09 11:43:47'
        ]);
        DB::table('parent_public_messages')->insert([
            'work_id' => 2,
            'user_id' => 1,
            'title' => 'id1がwork2のパブリックメッセージに投稿しました',
            'content' => 'パブリックメッセージの質問内容が入ります。パブリックメッセージの質問内容が入ります。パブリックメッセージの質問内容が入ります。パブリックメッセージの質問内容が入ります。パブリックメッセージの質問内容が入ります。パブリックメッセージの質問内容が入ります。パブリックメッセージの質問内容が入ります。パブリックメッセージの質問内容が入ります。パブリックメッセージの質問内容が入ります。パブリックメッセージの質問内容が入ります。',
            'created_at' => '2020-12-02 11:40:57',
            'updated_at' => '2020-12-02 11:40:57',
        ]);
    }
}
