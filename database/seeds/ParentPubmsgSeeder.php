<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ParentPubmsgSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parent_pubmsg')->insert([
            'id' => 1,
            'work_id' => 1,
            'user_id' => 1,
            'title' => 'はじめまして',
            'content' => '1.こんにちは初めまして。こんにちは初めまして。こんにちは初めまして。こんにちは初めまして。こんにちは初めまして。こんにちは初めまして。こんにちは初めまして。こんにちは初めまして。こんにちは初めまして。こんにちは初めまして。こんにちは初めまして。こんにちは初めまして。こんにちは初めまして。こんにちは初めまして。こんにちは初めまして。こんにちは初めまして。こんにちは初めまして。',
            'created_at' => '2020/11/25',
            'updated_at' => Carbon::now(),
        ]);
        DB::table('parent_pubmsg')->insert([
            'id' => 2,
            'work_id' => 1,
            'user_id' => 2,
            'title' => 'はじめまして',
            'content' => '2.こんにちは初めまして。こんにちは初めまして。こんにちは初めまして。こんにちは初めまして。こんにちは初めまして。こんにちは初めまして。こんにちは初めまして。こんにちは初めまして。こんにちは初めまして。こんにちは初めまして。こんにちは初めまして。こんにちは初めまして。こんにちは初めまして。こんにちは初めまして。こんにちは初めまして。こんにちは初めまして。こんにちは初めまして。',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('parent_pubmsg')->insert([
            'id' => 3,
            'work_id' => 1,
            'user_id' => 2,
            'title' => 'はじめまして',
            'content' => '3.こんにちは初めまして。こんにちは初めまして。こんにちは初めまして。こんにちは初めまして。こんにちは初めまして。こんにちは初めまして。こんにちは初めまして。こんにちは初めまして。こんにちは初めまして。こんにちは初めまして。こんにちは初めまして。こんにちは初めまして。こんにちは初めまして。こんにちは初めまして。こんにちは初めまして。こんにちは初めまして。こんにちは初めまして。',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
