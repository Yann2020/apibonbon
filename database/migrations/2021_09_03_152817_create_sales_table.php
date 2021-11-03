<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\ForeignKeyDefinition;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("quantity");
            $table->float("earn");
            $table->string("customer_name",255);
            $table->text("description")->nullable();
            $table->string("specie_name",255);
            $table->integer("admin_id")->index();
            $table->foreign("admin_id")->references("id")->on("admins");
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
        Schema::dropIfExists('sales');
    }
}
