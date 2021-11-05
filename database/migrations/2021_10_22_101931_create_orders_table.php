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
            $table->string('dropoffaddress');
            $table->string('duration');
            $table->string('distance');
            $table->string('date');
            $table->string('referencecode');
            $table->string('pickupsign');
            $table->string('flight');
            $table->string('notes');
            $table->string('lastname');
            $table->string('firstname');
            $table->string('email');
            $table->string('phone');
            $table->boolean('is_complete')->default(false);
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
