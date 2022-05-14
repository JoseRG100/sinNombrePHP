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
            'name' => 'admin1',
            'email' => 'admin1@thebinaries.com',
            'password' => Hash::make('admin'),
            'tipo' => '1',
        ]);

        $user1 = User::create([
            'name' => 'usuario Carlos',
            'email' => 'carlos@thebinaries.com',
            'password' => Hash::make('admin'),
            'tipo' => '2',
        ]);
        $user1 = User::create([
            'name' => 'usuario Lorena',
            'email' => 'lorena@thebinaries.com',
            'password' => Hash::make('admin'),
            'tipo' => '3',
        ]);
    }
}
