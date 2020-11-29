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
        DB::table('dm_contents')->insert([
            'id' => 1,
            'work_id' => 1,
            'board_id' => 1,
            'user_id' => 1,
            'content' => '1111111111',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('dm_contents')->insert([
            'id' => 2,
            'work_id' => 1,
            'board_id' => 1,
            'user_id' => 2,
            'content' => '2222222222222',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('dm_contents')->insert([
            'id' => 3,
            'work_id' => 1,
            'board_id' => 1,
            'user_id' => 2,
            'content' => '2222222222222',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('dm_contents')->insert([
            'id' => 4,
            'work_id' => 1,
            'board_id' => 1,
            'user_id' => 2,
            'content' => '111111111111',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
