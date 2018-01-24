<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeaturePackageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feature-package', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('feature_id')->unsigned()->nullable();
            $table->foreign('feature_id')->references('id')
                ->on('features')->onDelete('cascade');

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
        Schema::dropIfExists('feature-package');
    }
}
