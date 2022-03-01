<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        \App\Models\Account::factory()->count(20)->create();
        \App\Models\Admin::factory()->count(20)->create();
        \App\Models\AvgAnimalWeight::factory()->count(20)->create();
        \App\Models\Batche::factory()->count(20)->create();
        \App\Models\Breed::factory()->count(20)->create();
        \App\Models\Disease::factory()->count(20)->create();
        \App\Models\Expenses::factory()->count(20)->create();
        \App\Models\Farmer::factory()->count(20)->create();
    }
}
