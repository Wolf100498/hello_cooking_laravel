<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->string('product_name');
            $table->bigInteger('stock_in');
            $table->bigInteger('stock_out')->default(0);
            $table->bigInteger('stock_left')->default(0);
            $table->bigInteger('stock_sales')->default(0);
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->date('created_at');
            $table->date('updated_at');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventories');
    }
};
