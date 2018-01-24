<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAddressPhoneAddress extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('general_settings', function (Blueprint $table) {
            //
            $table->string('phone')->nullable()->after('site_email');
            $table->string('address_english')->nullable()->after('site_email');
            $table->string('address_arabic')->nullable()->after('site_email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('general_settings', function (Blueprint $table) {
            //
            $table->dropColumn('phone');
            $table->dropColumn('address_english');
            $table->dropColumn('address_arabic');
        });
    }
}
