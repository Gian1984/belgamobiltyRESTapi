<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lastname')->nullable();
            $table->string('firstname')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('amount');
            $table->string('transactionID')->nullable();
            $table->string('cardBrand')->nullable();
            $table->string('lastFour')->nullable();
            $table->string('expire')->nullable();
            $table->string('billing')->nullable();
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
        Schema::dropIfExists('quotations');
    }
}
