<?php

use Illuminate\Database\Seeder;

class ImportedClasslistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ImportedClasslist::class,17)->create();
    }
}
