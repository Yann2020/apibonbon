<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodsStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foods_stocks', function (Blueprint $table) {
            $table->increments("id");
            $table->float("quantity");
            $table->integer("cost");
            $table->text("description")->nullable()->default(null);
            $table->integer("foods_type_id")->index();
            $table->integer("food_id")->index();
            $table->integer("admin_id")->index();
            $table->foreign("foods_type_id")->references("id")->on("foods_types")->onDelete("cascade");
            $table->foreign("food_id")->references("id")->on("foods")->onDelete("cascade");
            $table->foreign("admin_id")->references("id")->on("admin_id");
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
        Schema::dropIfExists('foods_stocks');
    }
}
