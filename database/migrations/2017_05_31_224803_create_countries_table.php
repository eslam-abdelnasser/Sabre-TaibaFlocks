<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('countries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('option_id')->unsigned()->nullable();
            $table->foreign('option_id')->references('id')
                ->on('options')->onDelete('cascade');

            $table->integer('package_id')->unsigned()->nullable();
            $table->foreign('package_id')->references('id')
                ->on('packages')->onDelete('cascade');
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
        //
    }
}
