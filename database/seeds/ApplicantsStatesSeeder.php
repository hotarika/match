<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ApplicantsStatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('applicants_states')->insert([
            'id' => 1,
            'state' => '応募中',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('applicants_states')->insert([
            'id' => 2,
            'state' => '決定',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
