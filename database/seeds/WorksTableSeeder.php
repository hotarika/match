<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class WorksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('works')->insert([
            'id' => 1,
            'user_id' => 1,
            'title' => '1.お願いしますよ',
            'contract_id' => 1,
            'money_lower' => 1000,
            'money_upper' => 2000,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('works')->insert([
            'id' => 2,
            'user_id' => 2,
            'title' => '2.お願いしますよ',
            'contract_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('works')->insert([
            'id' => 3,
            'user_id' => 3,
            'title' => '3.お願いしますよ',
            'contract_id' => 1,
            'money_lower' => 1500,
            'money_upper' => 2500,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('works')->insert([
            'id' => 4,
            'user_id' => 4,
            'title' => '4.お願いしますよ',
            'contract_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
