<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFarmersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farmers', function (Blueprint $table) {
            $table->integer("id")->primary();
            $table->integer("admin_id")->unsigned()->index();
            $table->integer("specie_id")->unsigned()->index();
            $table->foreign("admin_id")->references("id")->on("admins")->onDelete("cascade");
            $table->foreign("specie_id")->references("id")->on("species")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('farmers');
    }
}
