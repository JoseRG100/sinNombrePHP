<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
        $this->call(TodosSeeder::class);
        $this->call(CoursesSeeder::class);
        $this->call(SchedulesSeeder::class);
        $this->call(AsignaturasSeeder::class);
        $this->call(WorkSeeder::class);
        $this->call(ExamSeeder::class);
        $this->call(EnrollmentSeeder::class);

    }
}
