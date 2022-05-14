<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Asignatura;

class AsignaturasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Asignatura1=Asignatura::create([
            'id_teacher' => 1,
		    'id_course' => 1,
		    'id_shedule' => 1,
		    'name' => 'Geografía',
		    'color' => 'verde',
            ]);

        $Asignatura2=Asignatura::create([
            'id_teacher' => 2,
            'id_course' => 1,
            'id_shedule' => 2,
            'name' => 'Matemáticas',
            'color' => 'verde',
            ]);

        $Asignatura3=Asignatura::create([
            'id_teacher' => 1,
            'id_course' => 2,
            'id_shedule' => 3,
            'name' => 'Biología',
            'color' => 'verde',
            ]);
        
        $Asignatura4=Asignatura::create([
            'id_teacher' => 3,
		    'id_course' => 2,
		    'id_shedule' => 4,
		    'name' => 'Dibujo Técnico',
		    'color' => 'amarillo',
            ]);

        $Asignatura5=Asignatura::create([
            'id_teacher' => 2,
            'id_course' => 3,
            'id_shedule' => 5,
            'name' => 'Lengua',
            'color' => 'azul',
            ]);

        $Asignatura6=Asignatura::create([
            'id_teacher' => 4,
            'id_course' => 3,
            'id_shedule' => 6,
            'name' => 'Historia',
            'color' => 'azul',
            ]);
        $Asignatura7=Asignatura::create([
            'id_teacher' => 3,
            'id_course' => 4,
            'id_shedule' => 71,
            'name' => 'Física y Química',
            'color' => 'naranja',
            ]);
    
        $Asignatura8=Asignatura::create([
            'id_teacher' => 5,
            'id_course' => 4,
            'id_shedule' => 8,
            'name' => 'Inglés',
            'color' => 'naranja',
            ]);


    }
}
