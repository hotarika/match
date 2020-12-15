<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class DirectMessagesBoardsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // work_id1
        DB::table('direct_messages_boards')->insert([
            'work_id' => 1,
            'applicant_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('direct_messages_boards')->insert([
            'work_id' => 1,
            'applicant_id' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('direct_messages_boards')->insert([
            'work_id' => 1,
            'applicant_id' => 4,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('direct_messages_boards')->insert([
            'work_id' => 1,
            'applicant_id' => 6,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('direct_messages_boards')->insert([
            'work_id' => 1,
            'applicant_id' => 7,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // work_id2
        DB::table('direct_messages_boards')->insert([
            'work_id' => 2,
            'applicant_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('direct_messages_boards')->insert([
            'work_id' => 2,
            'applicant_id' => 4,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('direct_messages_boards')->insert([
            'work_id' => 2,
            'applicant_id' => 5,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
