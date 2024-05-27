<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Kevmorlo',
            'email' => 'kevinlebeau2004@gmail.com',
            'password' => '+xiq5w7eej/,Pjxiy+iI',
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'Docusland',
            'email' => 'erwann.duclos@reseau-cd.net',
            'password' => 'L|G!R21^lBmKntqvC8mW',
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'ArToXx!',
            'email' => 'emilien.cuny@ecoles-epsi.net',
            'password' => '32N2?+`Z?KG&2!5P8RwA'
        ]);
    }
}
