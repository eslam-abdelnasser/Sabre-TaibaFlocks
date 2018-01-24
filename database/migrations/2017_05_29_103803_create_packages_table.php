<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('status',[0,1]);
            $table->string('image_url')->nullable();

            $table->dateTime('reservation_start_date')->nullable();
            $table->dateTime('reservation_end_date')->nullable();
            $table->dateTime('journey_start_date')->nullable();
            $table->dateTime('journey_end_date')->nullable();
            $table->dateTime('cancellation_date')->nullable();
            $table->bigInteger('max_number')->nullable();
            $table->bigInteger('min_number')->nullable();
            $table->integer('over_all_rating')->nullable();
            $table->bigInteger('points')->nullable();
            $table->integer('user_group_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('packages');
    }
}
