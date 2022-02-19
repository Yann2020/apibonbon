<?php

use Illuminate\Database\Seeder;
use App\Models\Expenses;

class ExpensesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Expenses::factory()->count(20)->create();
    }
}
