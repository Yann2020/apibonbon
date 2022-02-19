<?php

use Illuminate\Database\Seeder;
use App\Models\Farmer;

class FarmerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Farmer::factory()->count(20)->create();
    }
}
