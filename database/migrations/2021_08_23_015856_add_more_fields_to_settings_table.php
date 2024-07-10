<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMoreFieldsToSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->string('web_title')->nullable();
            $table->string('address')->nullable();
            $table->string('reference')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('schedule_days')->nullable();
            $table->string('schedule_hours')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn('web_title');
            $table->dropColumn('address');
            $table->dropColumn('reference');
            $table->dropColumn('phone');
            $table->dropColumn('email');
            $table->dropColumn('schedule_days');
            $table->dropColumn('schedule_hours');
        });
    }
}
