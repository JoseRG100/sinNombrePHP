<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Exam;

class ExamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Exam1 = Exam::create([
            'id_class' => '1',
            'id_student' => '2',
            'name' => 'Aprobado',
            'mark' => '9.5',

        ]);
        $Exam = Exam::create([
            'id_class' => '3',
            'id_student' => '2',
            'name' => 'Suspendido',
            'mark' => '3',

        ]);

        $Exam = Exam::create([
            'id_class' => '3',
            'id_student' => '2',
            'name' => 'Aprobado',
            'mark' => '7',

        ]);
    }
}
