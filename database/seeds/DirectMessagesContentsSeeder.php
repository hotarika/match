<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class DirectMessagesContentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // board 1
        DB::table('direct_messages_contents')->insert([
            'board_id' => 1,
            'user_id' => 1,
            'content' => 'Board1, user_id1 -> user_id2 へダイレクトメッセージを送りました。',
            'created_at' => '2020-10-3 00:52:49',
            'updated_at' => Carbon::now(),
        ]);
        DB::table('direct_messages_contents')->insert([
            'board_id' => 1,
            'user_id' => 2,
            'content' => 'Board1, user_id2 -> user_id1 へダイレクトメッセージを送りました。',
            'created_at' => '2020-11-8 00:52:49',
            'updated_at' => Carbon::now(),
        ]);
        DB::table('direct_messages_contents')->insert([
            'board_id' => 1,
            'user_id' => 1,
            'content' => 'Board1, user_id1 -> user_id2 へダイレクトメッセージを送りました。',
            'created_at' => '2020-11-30 00:52:49',
            'updated_at' => Carbon::now(),
        ]);

        // board 2
        DB::table('direct_messages_contents')->insert([
            'board_id' => 2,
            'user_id' => 1,
            'content' => 'Board2, user_id1 -> user_id3 へダイレクトメッセージを送りました。',
            'created_at' => '2020-8-30 00:52:49',
            'updated_at' => Carbon::now(),
        ]);
        DB::table('direct_messages_contents')->insert([
            'board_id' => 2,
            'user_id' => 3,
            'content' => 'Board2, user_id3 -> user_id1 へダイレクトメッセージを送りました。',
            'created_at' => '2020-9-14 00:52:49',
            'updated_at' => Carbon::now(),
        ]);
    }
}
