<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Evra',
            'email' => 'AdminEvra@gmail.com',
            'password' => bcrypt('Logemoi123456789'),
        ]);

        // Si vous utilisez Laratrust pour la gestion des rôles, attachez le rôle d'administrateur
        $user->attachRole('admin');
    }
}
