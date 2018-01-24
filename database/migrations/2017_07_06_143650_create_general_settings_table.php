<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneralSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('site_url' , 250)->nullable();
            $table->string('site_email' , 250)->nullable();
            $table->text('site_description')->nullable();
            $table->string('site_keywords' , 250 )->nullable();
            $table->string('site_google_analytics_id' , 250)->nullable();
            $table->text('google_javascript_code')->nullable();
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
        Schema::dropIfExists('general_settings');
    }
}
