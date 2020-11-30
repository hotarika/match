<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class DmBoardsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dm_boards')->insert([
            'id' => 1,
            'work_id' => 1,
            'owner_user_id' => 1,
            'order_user_id' => 2,
            'created_at' => '2020-11-30 00:52:49',
            'updated_at' => Carbon::now(),
        ]);
        DB::table('dm_boards')->insert([
            'id' => 2,
            'work_id' => 2,
            'owner_user_id' => 1,
            'order_user_id' => 2,
            'created_at' => '2020-11-20 00:52:49',
            'updated_at' => Carbon::now(),
        ]);
        DB::table('dm_boards')->insert([
            'id' => 3,
            'work_id' => 3,
            'owner_user_id' => 1,
            'order_user_id' => 2,
            'created_at' => '2020-11-10 00:52:49',
            'updated_at' => Carbon::now(),
        ]);
    }
}
