<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Courses;


class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $Curso1=Courses::create([
                'name' => 'Matemáticas 1º ESO',
                'description' => 'Repaso Trimestre 1',
                'date_start' => '2021-10-11',
                'date_end' => '2022-12-11',
                'active' => '1',
            ]);

            $Curso2=Courses::create([
                'name' => 'Inglés 2',
                'description' => 'Inglés avanzado',
                'date_start' => '2021-10-01',
                'date_end' => '2022-12-15',
                'active' => '1',
            ]);

            $Curso3=Courses::create([
                'name' => 'Biología',
                'description' => 'Repaso Curso',
                'date_start' => '2021-10-01',
                'date_end' => '2022-12-15',
                'active' => '1',
            ]);
    }
}


