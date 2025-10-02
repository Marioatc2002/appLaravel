<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Aquí llamas todos tus seeders en orden correcto
        $this->call([
            RoboticsSeeder::class, // primero los kits (porque courses depende de esto)
            CoursesSeeder::class,  // luego los cursos
            UserSeeder::class,     // y después los usuarios
        ]);
    }
}
