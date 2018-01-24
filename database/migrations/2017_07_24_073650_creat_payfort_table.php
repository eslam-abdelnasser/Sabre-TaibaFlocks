<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatPayfortTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payfort', function (Blueprint $table) {
            $table->increments('id');
            $table->float('amount', 8, 2)->nullable();
            $table->string('card_number')->nullable();
            $table->string('holder_name')->nullable();
            $table->string('payment_option')->nullable();
            $table->string('customer_ip')->nullable();
            $table->string('fort_id')->nullable();
            $table->string('response_message')->nullable();
            $table->string('customer_email')->nullable();
            $table->string('customer_name')->nullable();
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
        Schema::dropIfExists('payfort');
    }
}
