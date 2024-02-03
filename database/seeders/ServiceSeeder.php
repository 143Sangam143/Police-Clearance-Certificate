<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                "category" => "Police",
                "description" => "You can apply for police reports.",
                "image" => "police.png"
            ],
        ];
        Service::insert($services);
    }
}
