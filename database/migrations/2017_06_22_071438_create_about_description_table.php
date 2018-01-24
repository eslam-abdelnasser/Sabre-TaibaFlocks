<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAboutDescriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_description', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('about_id')->unsigned();
            $table->foreign('about_id')->references('id')->on('abouts')->onDelete('cascade');
            $table->integer('lang_id')->unsigned();
            $table->string('title' , 250)->nullable();
            $table->text('description')->nullable();
            $table->string('meta_title' , 250)->nullable();
            $table->string('meta_description' , 250)->nullable();
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
        Schema::dropIfExists('about_description');
    }
}
