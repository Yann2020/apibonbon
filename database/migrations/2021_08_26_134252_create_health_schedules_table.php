<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHealthSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('health_schedules', function (Blueprint $table) {
            $table->increments("id");
            $table->text("description");
            $table->string("specie_name",255);
            $table->string("type",200);
            $table->integer("farmer_id")->index();
            $table->integer("disease_id")->unsigned()->index();
            $table->integer("status_schedule_id")->unsigned()->index();
            $table->foreign("farmer_id")->references("id")->on("farmers")->onDelete("cascade");
            $table->foreign("disease_id")->references("id")->on("diseases")->onDelete("cascade");
            $table->foreign("status_schedule_id")->references("id")->on("status_schedules")->onDelete("cascade");
            $table->date("scheduled_at");
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
        Schema::dropIfExists('health_schedules');
    }
}
