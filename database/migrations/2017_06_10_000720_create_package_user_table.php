<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackageUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('package_user', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('package_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->dateTime('booking_date')->nullable();
            $table->tinyInteger('status')->nullable();  // it will be 1 for paid  , 2 for not  , 3 for canceled 
            $table->string('amount')->nullable(); 

            $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

         });
     }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('package_user');
    }
}
