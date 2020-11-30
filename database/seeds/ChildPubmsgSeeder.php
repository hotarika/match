<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ChildPubmsgSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('child_pubmsg')->insert([
            'id' => 1,
            'work_id' => 1,
            'parent_id' => 1,
            'user_id' => 2,
            'content' => '1-1.私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。',
            'created_at' => '2020-11-29 18:19:29',
            'updated_at' => Carbon::now(),
        ]);
        DB::table('child_pubmsg')->insert([
            'id' => 2,
            'work_id' => 2,
            'parent_id' => 1,
            'user_id' => 1,
            'content' => '1-2.私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。',
            'created_at' => '2020-11-28 18:19:29',
            'updated_at' => Carbon::now(),
        ]);
        DB::table('child_pubmsg')->insert([
            'id' => 3,
            'work_id' => 2,
            'parent_id' => 1,
            'user_id' => 2,
            'content' => '1-3.私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。',
            'created_at' => '2020-11-26 18:19:29',
            'updated_at' => Carbon::now(),
        ]);
        DB::table('child_pubmsg')->insert([
            'id' => 4,
            'work_id' => 3,
            'parent_id' => 2,
            'user_id' => 2,
            'content' => '2-1.私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。',
            'created_at' => '2020-11-20 18:19:29',
            'updated_at' => Carbon::now(),
        ]);
        DB::table('child_pubmsg')->insert([
            'id' => 5,
            'work_id' => 3,
            'parent_id' => 2,
            'user_id' => 2,
            'content' => '2-2.私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。',
            'created_at' => '2020-11-21 18:19:29',
            'updated_at' => Carbon::now(),
        ]);
    }
}
