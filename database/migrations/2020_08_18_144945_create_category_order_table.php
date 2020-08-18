<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_order', function (Blueprint $table) {
            $table->bigInteger('order_id')->unsigned();
            $table->bigInteger('category_id')->unsigned();
            $table->integer('quantity');
            $table->timestamps();

            $table->foreign('order_id')
                ->references('id')->on('orders')
                ->onDelete('cascade');

            $table->foreign('category_id')
                ->references('id')->on('categories')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_order');
    }
}
