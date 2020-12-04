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
        $this->call(UsersTableSeeder::class);
        $this->call(WorksTableSeeder::class);
        $this->call(ContractsTableSeeder::class);
        $this->call(ParentPublicMessagesSeeder::class);
        $this->call(ChildPublicMessagesSeeder::class);
        $this->call(DirectMessagesBoardsSeeder::class);
        $this->call(DirectMessagesContentsSeeder::class);
        $this->call(WorksStatesSeeder::class);
        $this->call(ApplicantsSeeder::class);
        $this->call(ApplicantsStatesSeeder::class);
    }
}
