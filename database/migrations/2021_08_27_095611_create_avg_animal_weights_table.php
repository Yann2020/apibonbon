<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvgAnimalWeightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avg_animal_weights', function (Blueprint $table) {
            $table->increments("id");
            $table->float("max_animal_weight");
            $table->float("min_animal_weight");
            $table->string("species_name");
            $table->float("overall_average");
            $table->integer("batche_id")->unsigned()->index();
            $table->integer("farmer_id")->index();
            $table->foreign("batche_id")->references("id")->on("batches")->onDelete("cascade");
            $table->foreign("farmer_id")->references("id")->on("farmers")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('avg_animal_weights');
    }
}
