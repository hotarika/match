<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ApplicantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // work_id1に応募
        DB::table('applicants')->insert([
            'work_id' => 1,
            'applicant_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('applicants')->insert([
            'work_id' => 1,
            'applicant_id' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('applicants')->insert([
            'work_id' => 1,
            'applicant_id' => 4,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // work_id2に応募
        DB::table('applicants')->insert([
            'work_id' => 2,
            'applicant_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('applicants')->insert([
            'work_id' => 2,
            'applicant_id' => 4,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('applicants')->insert([
            'work_id' => 2,
            'applicant_id' => 5,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // テスト用
        DB::table('applicants')->insert([
            'work_id' => 2,
            'applicant_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('applicants')->insert([
            'work_id' => 2,
            'applicant_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('applicants')->insert([
            'work_id' => 2,
            'applicant_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('applicants')->insert([
            'work_id' => 2,
            'applicant_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('applicants')->insert([
            'work_id' => 2,
            'applicant_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('applicants')->insert([
            'work_id' => 2,
            'applicant_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('applicants')->insert([
            'work_id' => 2,
            'applicant_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('applicants')->insert([
            'work_id' => 2,
            'applicant_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('applicants')->insert([
            'work_id' => 2,
            'applicant_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('applicants')->insert([
            'work_id' => 2,
            'applicant_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('applicants')->insert([
            'work_id' => 2,
            'applicant_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('applicants')->insert([
            'work_id' => 2,
            'applicant_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
