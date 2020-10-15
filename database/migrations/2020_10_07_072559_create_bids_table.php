<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bids', function (Blueprint $table) {
            $table->id();
            $table->text('description')->nullable();
            $table->string('price')->nullable();
            $table->string('timelimit')->nullable();
            $table->integer('executor_id');
            $table->foreign('executor_id')->references('id')->on('users');
            $table->integer('order_id');
            $table->foreign('order_id')->references('id')->on('orders');
            $table->string('status');
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
        Schema::dropIfExists('bids');
    }
}
