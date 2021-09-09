<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rules\Unique;

class CreateItemsToSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items_to_sales', function (Blueprint $table) {
            $table->increments("id");
            $table->string("name")->unique();
            $table->integer("cost_per_item");
            $table->integer("specie_id")->index();
            $table->integer("admin_id")->index();
            $table->foreign("specie_id")->references("id")->on("species")->onDelete("cascade");
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
        Schema::dropIfExists('items_to_sales');
    }
}
