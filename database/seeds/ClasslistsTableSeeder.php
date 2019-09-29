<?php

use Illuminate\Database\Seeder;

class ClasslistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Classlist::class, 40)->create();
    }
}
