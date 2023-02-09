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
            $table -> id();
            $table -> string('first_name',255);
            $table -> string('last_name',255);
            $table -> string('address',255);
            $table -> string('token',500);
            $table -> string('city',255);
            $table -> string('status',255);
            $table -> integer('postcode');
            $table -> integer('phone');
            $table -> string('email',255);
            $table -> json('products_id')->nullable();
            // $table -> foreign('products_id')->references('id')->on('products')->onDelete('cascade');
            $table -> integer('total_price');
            $table -> timestamps();
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
