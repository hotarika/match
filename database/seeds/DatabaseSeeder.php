<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // 必須
        $this->call(UsersTableSeeder::class);
        $this->call(ContractsTableSeeder::class);
        $this->call(ApplicantsStatesSeeder::class);
        $this->call(WorksStatesSeeder::class);

        // 任意
        $this->call(WorksTableSeeder::class);
        $this->call(ParentPublicMessagesSeeder::class);
        $this->call(ChildPublicMessagesSeeder::class);
        $this->call(DirectMessagesBoardsSeeder::class);
        $this->call(DirectMessagesContentsSeeder::class);
        $this->call(ApplicantsSeeder::class);
    }
}
