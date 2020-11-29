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
            'user_id' => 1,
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
            'user_id' => 1,
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
        DB::table('works')->insert([
            'id' => 5,
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
        DB::table('works')->insert([
            'id' => 6,
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
        DB::table('works')->insert([
            'id' => 7,
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
        DB::table('works')->insert([
            'id' => 8,
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
        DB::table('works')->insert([
            'id' => 9,
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
        DB::table('works')->insert([
            'id' => 10,
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
        DB::table('works')->insert([
            'id' => 11,
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
        DB::table('works')->insert([
            'id' => 12,
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
        DB::table('works')->insert([
            'id' => 13,
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
        DB::table('works')->insert([
            'id' => 14,
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
        DB::table('works')->insert([
            'id' => 15,
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
        DB::table('works')->insert([
            'id' => 16,
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
        DB::table('works')->insert([
            'id' => 17,
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
        DB::table('works')->insert([
            'id' => 18,
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
        DB::table('works')->insert([
            'id' => 19,
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
        DB::table('works')->insert([
            'id' => 20,
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
        DB::table('works')->insert([
            'id' => 21,
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
        DB::table('works')->insert([
            'id' => 22,
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
        DB::table('works')->insert([
            'id' => 23,
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
        DB::table('works')->insert([
            'id' => 24,
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
        DB::table('works')->insert([
            'id' => 25,
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
        DB::table('works')->insert([
            'id' => 26,
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
        DB::table('works')->insert([
            'id' => 27,
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
        DB::table('works')->insert([
            'id' => 28,
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
        DB::table('works')->insert([
            'id' => 29,
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
        DB::table('works')->insert([
            'id' => 30,
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
        DB::table('works')->insert([
            'id' => 31,
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
