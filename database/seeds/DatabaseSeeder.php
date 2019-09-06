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
        $this->call(ImportedClasslistsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(SubjectsTableSeeder::class);
    }
}
