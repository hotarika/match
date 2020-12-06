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
            'user_id' => 1,
            'name' => '1-1.お願いしますよ',
            'contract_id' => 1,
            'end_date' => '2020/12/28',
            'hope_date' => '2021/01/22',
            'price_lower' => 1000,
            'price_upper' => 2000,
            'content' => '仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('works')->insert([
            'user_id' => 2,
            'name' => '2.お願いしますよ',
            'contract_id' => 2,
            'end_date' => '2020/12/22',
            'hope_date' => '2021/01/28',
            'price_lower' => 1000,
            'price_upper' => 2000,
            'content' => '仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        // DB::table('works')->insert([
        //     'user_id' => 2,
        //     'name' => '2-1.お願いしますよ',
        //     'contract_id' => 1,
        //     'end_date' => '2020/12/28',
        //     'hope_date' => '2021/02/28',
        //     'price_lower' => 1000,
        //     'price_upper' => 2000,
        //     'content' => '仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now(),
        // ]);
        // DB::table('works')->insert([
        //     'user_id' => 2,
        //     'name' => '2-2.お願いしますよ',
        //     'contract_id' => 2,
        //     'end_date' => '2020/12/22',
        //     'hope_date' => '2021/03/28',
        //     'price_lower' => 1000,
        //     'price_upper' => 2000,
        //     'content' => '仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。仕事の説明が入ります。',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now(),
        // ]);
    }
}
