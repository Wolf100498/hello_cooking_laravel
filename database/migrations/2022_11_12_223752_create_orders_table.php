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
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order_number')->unique();
            $table->integer('user_id');

            $table->enum('status', ['pending', 'accepted', 'shipped', 'completed', 'decline'])->default('pending');
            $table->integer('grand_total');
            $table->unsignedInteger('item_count');
            
            $table->boolean('payment_status')->default(1);
            $table->string('payment_method')->nullable();
            
            $table->string('name');
            $table->string('email');
            $table->text('address');
            $table->string('phone');
            $table->text('notes')->nullable();


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
        Schema::dropIfExists('orders');
    }
};
