<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Schedule;


class SchedulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $Schedule1=Schedule::create([
        'id_class' => '1',
		'time_start' => '2021-10-01 18:00:00',
		'time_end' => '2021-10-01 20:00:00',
		'day' => '2021-10-01',
       ]);

       $Schedule2=Schedule::create([
        'id_class' => '2',
		'time_start' => '2021-11-22 16:30:00',
		'time_end' => '2021-11-22 18:30:00',
		'day' => '2021-11-27',
       ]);


       $Schedule3=Schedule::create([
        'id_class' => '1',
		'time_start' => '2021-12-01 17:00:00',
		'time_end' => '2021-12-01 19:00:00',
		'day' => '2021-12-01',

       ]);

       $Schedule4=Schedule::create([
        'id_class' => '2',
		'time_start' => '2021-12-09 16:00:00',
		'time_end' => '2021-12-09 18:00:00',
		'day' => '2021-12-09',

       ]);

    }
}
