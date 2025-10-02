<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::create([
            'course_key' => 'ROB101',
            'course_name' => 'Introduction to Robotics',
            'robotics_kit_id' => 1
        ]);

        Course::create([
            'course_key' => 'ROB102',
            'course_name' => 'Introduction to Automation',
            'robotics_kit_id' => 1
        ]);

        Course::create([
            'course_key' => 'ROB103',
            'course_name' => 'Programming for Robotics',
            'robotics_kit_id' => 2
        ]);

        Course::create([
            'course_key' => 'ROB104',
            'course_name' => 'Characteristics of a Robot',
            'robotics_kit_id' => 3
        ]);
    }
}
