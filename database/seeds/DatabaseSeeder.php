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
        $this->call(ParentPubmsgSeeder::class);
        $this->call(ChildPubmsgSeeder::class);
        $this->call(FavoritesSeeder::class);
        $this->call(DmBoardsSeeder::class);
        $this->call(DmContentsSeeder::class);
    }
}
