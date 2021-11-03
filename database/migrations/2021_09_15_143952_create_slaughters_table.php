<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlaughtersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slaughters', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("quantity");
            $table->string("specie_name",200);
            $table->string("reason",200);
            $table->text("description")->nullable();
            $table->integer("farmer_id")->index();
            $table->integer("stock_items_to_sale_id")->unsigned()->index();
            $table->foreign("farmer_id")->references("id")->on("farmers");
            $table->foreign("stock_items_to_sale_id")->references("id")->on("stock_items_to_sales")->cascadeOnDelete();
            $table->date("slaughter_day");
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
        Schema::dropIfExists('slaughters');
    }
}
