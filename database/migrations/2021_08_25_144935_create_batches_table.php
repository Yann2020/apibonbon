<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Null_;

class CreateBatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batches', function (Blueprint $table) {
            $table->increments("id");
            $table->string("name",255);
            $table->integer("admin_id")->index();
            $table->integer("breed_id")->index();
            $table->integer("specie_id")->index();
            $table->integer("total");
            $table->integer("cost_per_animal"); # this represent the unit purchase cost by animal  
            $table->string("supplier",255);
            $table->text("description")->nullable()->default("Hi, i am a farmer ...");
            #$table->string("status",200);  can be active or disable 
            $table->foreign("admin_id")->references("id")->on("admins")->onDelete("cascade");
            $table->foreign("breed_id")->references("id")->on("breeds")->onDelete("cascade");
            $table->foreign("specie_id")->references("id")->on("species")->onDelete("cascade");
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
        Schema::dropIfExists('batches');
    }
}
