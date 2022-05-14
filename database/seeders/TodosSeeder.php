<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class TodosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $useradmin = User::create([
            'name' => 'admin (Admin)',
            'email' => 'admin1@sinnombrephp.com',
            'password' => Hash::make('admin'),
            'tipo' => '1',
        ]);

        $user1 = User::create([
            'name' => 'Carlos (Alumno)',
            'email' => 'carlos@sinnombrephp.com',
            'password' => Hash::make('admin'),
            'tipo' => '2',
        ]);
        $user1 = User::create([
            'name' => 'Lorena (Profesor)',
            'email' => 'lorena@sinnombrephp.com',
            'password' => Hash::make('admin'),
            'tipo' => '3',
        ]);
    }
}
