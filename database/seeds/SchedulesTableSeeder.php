<?php

use Illuminate\Database\Seeder;

class SchedulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $schedules = factory(App\Schedule::class, 5)->create()->each(function ($user) {
            //create 5 posts for each user
            factory(App\Classlist::class, 5)->create([
                'schedule_id'=>$user->id,
                ]);
        });
               
    }
}
