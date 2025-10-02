<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RoboticKit;

class RoboticsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kits = [
            ['id' => 1, 'name' => 'StarterKit'],
            ['id' => 2, 'name' => 'Educational Robotics Kit'],
            ['id' => 3, 'name' => 'Kit5'],
        ];

        foreach ($kits as $kit) {
  
            RoboticKit::updateOrCreate(
                ['id' => $kit['id']],
                ['name' => $kit['name']]
            );
        }
    }
}
