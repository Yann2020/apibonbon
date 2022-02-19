<?php

use Illuminate\Database\Seeder;
use App\Models\AvgAnimalWeight;

class AvgAnimalWeightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\AvgAnimalWeight::factory()->count(20)->create();
    }
}
