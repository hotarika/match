<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ChildPublicMessagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // public_msg-id1
        DB::table('child_public_messages')->insert([
            'parent_id' => 1,
            'user_id' => 1,
            'content' => 'user_id1がparent_id1に返信しました。テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト',
            'created_at' => '2020-10-04 12:50:57',
            'updated_at' => '2020-10-04 12:50:57',
        ]);
        DB::table('child_public_messages')->insert([
            'parent_id' => 1,
            'user_id' => 2,
            'content' => 'user_id2がparent_id1に返信しました。テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト',
            'created_at' => '2020-10-05 11:50:57',
            'updated_at' => '2020-10-05 11:50:57',
        ]);
        DB::table('child_public_messages')->insert([
            'parent_id' => 1,
            'user_id' => 1,
            'content' => 'user_id1がparent_id1に返信しました。テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト',
            'created_at' => '2020-10-07 10:40:57',
            'updated_at' => '2020-10-07 10:40:57',
        ]);

        // public_msg-id2
        DB::table('child_public_messages')->insert([
            'parent_id' => 2,
            'user_id' => 1,
            'content' => 'user_id1がparent_id2に返信しました。テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト',
            'created_at' => '2020-10-07 10:44:57',
            'updated_at' => '2020-10-07 10:44:57'
        ]);
        DB::table('child_public_messages')->insert([
            'parent_id' => 2,
            'user_id' => 2,
            'content' => 'user_id2がparent_id2に返信しました。テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト',
            'created_at' => '2020-10-07 11:34:57',
            'updated_at' => '2020-10-07 11:34:57'
        ]);
        DB::table('child_public_messages')->insert([
            'parent_id' => 2,
            'user_id' => 1,
            'content' => 'user_id1がparent_id2に返信しました。テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト',
            'created_at' => '2020-10-10 21:34:57',
            'updated_at' => '2020-10-10 21:34:57'
        ]);

        // public_msg-id3
        DB::table('child_public_messages')->insert([
            'parent_id' => 2,
            'user_id' => 2,
            'content' => 'user_id2がparent_id3に返信しました。テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト',
            'created_at' => '2020-11-10 12:43:47',
            'updated_at' => '2020-11-10 12:43:47'
        ]);
        DB::table('child_public_messages')->insert([
            'parent_id' => 2,
            'user_id' => 4,
            'content' => 'user_id4がparent_id3に返信しました。テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト',
            'created_at' => '2020-11-20 16:43:47',
            'updated_at' => '2020-11-20 16:43:47'
        ]);

        // public_msg-id4
        DB::table('child_public_messages')->insert([
            'parent_id' => 4,
            'user_id' => 2,
            'content' => 'user_id2がparent_id4に返信しました。テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト',
            'created_at' => '2020-12-03 13:40:57',
            'updated_at' => '2020-12-03 13:40:57',
        ]);
        DB::table('child_public_messages')->insert([
            'parent_id' => 4,
            'user_id' => 1,
            'content' => 'user_id1がparent_id4に返信しました。テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト',
            'created_at' => '2020-12-06 13:40:27',
            'updated_at' => '2020-12-06 13:40:27',
        ]);
    }
}
