<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBatchOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batch_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('payment_option_id');
            $table->unsignedBigInteger('customer_id');
            $table->float('total_subtotal');
            $table->float('total_discount');
            $table->float('total_amount');
            $table->string('shipping_address');
            $table->string('shipping_cost');
            $table->string('status');
            $table->timestamps();
            $table->foreign('payment_option_id')->references('id')->on('payment_options');
            $table->foreign('customer_id')->references('id')->on('people');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('batch_orders');
    }
}
