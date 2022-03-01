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
        $this->call(AccountSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(AvgAnimalWeightSeeder::class);
        $this->call(BatcheSeeder::class);
        $this->call(BreedSeeder::class);
        $this->call(DiseaseSeeder::class);
        $this->call(ExpensesSeeder::class);
        $this->call(FarmerSeeder::class);


        // \App\Models\Account::factory()->count(20)->create();
        // \App\Models\Admin::factory()->count(20)->create();
        // \App\Models\AvgAnimalWeight::factory()->count(20)->create();
        // \App\Models\Batche::factory()->count(20)->create();
        // \App\Models\Breed::factory()->count(20)->create();
        // \App\Models\Disease::factory()->count(20)->create();
        // \App\Models\Expenses::factory()->count(20)->create();
        // \App\Models\Farmer::factory()->count(20)->create();
    }
}
