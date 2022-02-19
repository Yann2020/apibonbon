<?php

use Illuminate\Database\Seeder;
use App\Models\Batche;

class BatcheSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Batche::factory()->count(20)->create();
    }
}
