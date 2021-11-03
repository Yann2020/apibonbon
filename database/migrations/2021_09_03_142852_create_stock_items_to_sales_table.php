<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockItemsToSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_items_to_sales', function (Blueprint $table) {
            $table->increments("id");
            $table->float("quantity");
            $table->integer("items_to_sale_id")->unsigned()->index();
            $table->integer("farmer_id")->index();
            $table->foreign("items_to_sale_id")->references("id")->on("items_to_sales")->onDelete("cascade");
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
        Schema::dropIfExists('stock_items_to_sales');
    }
}
