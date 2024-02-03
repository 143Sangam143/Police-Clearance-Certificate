<?php

namespace Database\Seeders;

use App\Models\ServiceList;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $servicelists = [
            [
                "name" => "Police Clearance",
                "description" => "You can apply for police clearance certificate.",
                "image" => "police-list.png",
                "category" => "Police"
            ],
        ];
        ServiceList::insert($servicelists);
    }
}
