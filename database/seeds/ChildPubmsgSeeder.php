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
        // public_msg1
        DB::table('child_pubmsg')->insert([
            'parent_id' => 1,
            'user_id' => 2,
            'content' => '1-1.私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。',
            'created_at' => '2020-11-29 18:19:29',
            'updated_at' => Carbon::now(),
        ]);
        DB::table('child_pubmsg')->insert([
            'parent_id' => 1,
            'user_id' => 1,
            'content' => '1-3.私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。',
            'created_at' => '2020-12-26 18:19:29',
            'updated_at' => Carbon::now(),
        ]);
        DB::table('child_pubmsg')->insert([
            'parent_id' => 1,
            'user_id' => 2,
            'content' => '1-2.私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。',
            'created_at' => '2020-12-28 18:19:29',
            'updated_at' => Carbon::now(),
        ]);

        // public_msg2
        DB::table('child_pubmsg')->insert([
            'parent_id' => 2,
            'user_id' => 1,
            'content' => '2-1.私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。',
            'created_at' => '2020-10-20 18:19:29',
            'updated_at' => Carbon::now(),
        ]);
        DB::table('child_pubmsg')->insert([
            'parent_id' => 2,
            'user_id' => 2,
            'content' => '2-1.私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。',
            'created_at' => '2020-10-21 18:19:29',
            'updated_at' => Carbon::now(),
        ]);

        // pubmsg3
        DB::table('child_pubmsg')->insert([
            'parent_id' => 3,
            'user_id' => 3,
            'content' => '2-2.私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。',
            'created_at' => '2020-11-21 18:19:29',
            'updated_at' => Carbon::now(),
        ]);
        // pubmsg3
        DB::table('child_pubmsg')->insert([
            'parent_id' => 3,
            'user_id' => 1,
            'content' => '2-2.私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。',
            'created_at' => '2020-11-22 18:19:29',
            'updated_at' => Carbon::now(),
        ]);        // pubmsg3
        DB::table('child_pubmsg')->insert([
            'parent_id' => 3,
            'user_id' => 2,
            'content' => '2-2.私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。私は子どもです。',
            'created_at' => '2020-11-25 18:19:29',
            'updated_at' => Carbon::now(),
        ]);
    }
}
