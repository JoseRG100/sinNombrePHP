<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Enrollment;

class EnrollmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $enrollment1 = Enrollment::create([
            'id_student' => '2',
            'id_course' => '1',
            'status' => '1',
        ]);
    }
}
