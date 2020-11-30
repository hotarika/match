<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class DmContentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // board 1
        DB::table('dm_contents')->insert([
            'id' => 1,
            'work_id' => 1,
            'board_id' => 1,
            'user_id' => 1,
            'content' => '1111111111',
            'created_at' => '2020-10-3 00:52:49',
            'updated_at' => Carbon::now(),
        ]);
        DB::table('dm_contents')->insert([
            'id' => 2,
            'work_id' => 1,
            'board_id' => 1,
            'user_id' => 2,
            'content' => '11111111111111111',
            'created_at' => '2020-11-8 00:52:49',
            'updated_at' => Carbon::now(),
        ]);
        DB::table('dm_contents')->insert([
            'id' => 3,
            'work_id' => 1,
            'board_id' => 1,
            'user_id' => 2,
            'content' => '1111111111111',
            'created_at' => '2020-12-30 00:52:49',
            'updated_at' => Carbon::now(),
        ]);

        // board 2
        DB::table('dm_contents')->insert([
            'id' => 4,
            'work_id' => 2,
            'board_id' => 2,
            'user_id' => 2,
            'content' => '22222222222222222',
            'created_at' => '2020-8-30 00:52:49',
            'updated_at' => Carbon::now(),
        ]);
        DB::table('dm_contents')->insert([
            'id' => 5,
            'work_id' => 2,
            'board_id' => 2,
            'user_id' => 2,
            'content' => '22222222222222222',
            'created_at' => '2020-9-14 00:52:49',
            'updated_at' => Carbon::now(),
        ]);

        // board 3
        DB::table('dm_contents')->insert([
            'id' => 6,
            'work_id' => 3,
            'board_id' => 3,
            'user_id' => 2,
            'content' => '333333333333',
            'created_at' => '2020-7-8 00:42:49',
            'updated_at' => Carbon::now(),
        ]);
        DB::table('dm_contents')->insert([
            'id' => 7,
            'work_id' => 3,
            'board_id' => 3,
            'user_id' => 2,
            'content' => '333333333333',
            'created_at' => '2020-8-8 00:50:49',
            'updated_at' => Carbon::now(),
        ]);
        DB::table('dm_contents')->insert([
            'id' => 8,
            'work_id' => 3,
            'board_id' => 3,
            'user_id' => 2,
            'content' => '333333333333',
            'created_at' => '2020-8-11 00:52:49',
            'updated_at' => Carbon::now(),
        ]);
        DB::table('dm_contents')->insert([
            'id' => 9,
            'work_id' => 3,
            'board_id' => 3,
            'user_id' => 2,
            'content' => '3333',
            'created_at' => '2020-9-30 00:53:49',
            'updated_at' => Carbon::now(),
        ]);
    }
}
