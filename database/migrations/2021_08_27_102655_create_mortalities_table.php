<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMortalitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mortalities', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("number");
            $table->text("cause")->nullable();
            $table->string("specie_name");
            $table->integer("batche_id")->unsigned()->index();
            $table->integer("farmer_id")->index();
            $table->foreign("batche_id")->references("id")->on("batches")->onDelete("cascade");
            $table->foreign("farmer_id")->references("id")->on("farmers");
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
        Schema::dropIfExists('mortalities');
    }
}
