<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsToTakesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items_to_takes', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("total_take");
            $table->string("specie_name",255);
            $table->integer("farmer_id")->index();
            $table->foreign("farmer_id")->references("id")->on("famers")->onDelete("cascade");
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
        Schema::dropIfExists('items_to_takes');
    }
}
