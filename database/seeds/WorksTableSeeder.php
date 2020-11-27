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
            'name' => '1.お願いしますよ',
            'contract_id' => 1,
            'end_date' => '2020/11/28',
            'hope_date' => '2020/12/28',
            'money_lower' => 1000,
            'money_upper' => 2000,
            'content' => '仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('works')->insert([
            'id' => 2,
            'user_id' => 2,
            'name' => '2.お願いしますよ',
            'contract_id' => 2,
            'end_date' => '2020/11/28',
            'hope_date' => '2020/12/28',
            'money_lower' => 1000,
            'money_upper' => 2000,
            'content' => '仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('works')->insert([
            'id' => 3,
            'user_id' => 3,
            'name' => '3.お願いしますよ',
            'contract_id' => 1,
            'end_date' => '2020/11/28',
            'hope_date' => '2020/12/28',
            'money_lower' => 1000,
            'money_upper' => 2000,
            'content' => '仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('works')->insert([
            'id' => 4,
            'user_id' => 4,
            'name' => '4.お願いしますよ',
            'contract_id' => 2,
            'end_date' => '2020/11/28',
            'hope_date' => '2020/12/28',
            'money_lower' => 1000,
            'money_upper' => 2000,
            'content' => '仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
