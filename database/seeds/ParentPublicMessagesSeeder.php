<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ParentPublicMessagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parent_public_messages')->insert([
            'work_id' => 1,
            'user_id' => 1,
            'title' => '1番のボードです',
            'content' => '1.こんにちは初めまして。こんにちは初めまして。こんにちは初めまして。こんにちは初めまして。こんにちは初めまして。こんにちは初めまして。こんにちは初めまして。',
            'created_at' => '2020-10-3 12:44:57',
            'updated_at' => Carbon::now(),
        ]);
        DB::table('parent_public_messages')->insert([
            'work_id' => 2,
            'user_id' => 2,
            'title' => '2番のボードです',
            'content' => '2.こんにちは初めまして。こんにちは初めまして。こんにちは初めまして。こんにちは初めまして。こんにちは初めまして。こんにちは初めまして。こんにちは初めまして。',
            'created_at' => '2020-10-5 12:44:57',
            'updated_at' => Carbon::now(),
        ]);
        DB::table('parent_public_messages')->insert([
            'work_id' => 3,
            'user_id' => 3,
            'title' => '3番のボードです',
            'content' => '3.こんにちは初めまして。こんにちは初めまして。こんにちは初めまして。こんにちは初めまして。こんにちは初めまして。こんにちは初めまして。こんにちは初めまして。',
            'created_at' => '2020-10-7 12:44:57',
            'updated_at' => Carbon::now(),
        ]);
        DB::table('parent_public_messages')->insert([
            'work_id' => 4,
            'user_id' => 4,
            'title' => '4番のボードです',
            'content' => '4.こんにちは初めまして。こんにちは初めまして。こんにちは初めまして。こんにちは初めまして。こんにちは初めまして。こんにちは初めまして。こんにちは初めまして。',
            'created_at' => '2020-10-7 12:45:57',
            'updated_at' => Carbon::now(),
        ]);
        DB::table('parent_public_messages')->insert([
            'work_id' => 5,
            'user_id' => 5,
            'title' => '5番のボードです',
            'content' => '5.こんにちは初めまして。こんにちは初めまして。こんにちは初めまして。こんにちは初めまして。こんにちは初めまして。こんにちは初めまして。こんにちは初めまして。',
            'created_at' => '2020-10-7 12:45:57',
            'updated_at' => Carbon::now(),
        ]);
    }
}
