<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('user_id');
            $table->string('amount');
            $table->string('pickupaddress');
            $table->string('dropoffaddress')->nullable();
            $table->string('duration');
            $table->string('distance')->nullable();
            $table->string('date');
            $table->string('referencecode')->nullable();
            $table->string('pickupsign')->nullable();
            $table->string('flight')->nullable();
            $table->string('notes')->nullable();
            $table->string('lastname')->nullable();
            $table->string('firstname')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('transactionID')->nullable();
            $table->string('cardBrand')->nullable();
            $table->string('lastFour')->nullable();
            $table->string('expire')->nullable();
            $table->boolean('is_complete')->default(false);
            $table->string('language')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
}
