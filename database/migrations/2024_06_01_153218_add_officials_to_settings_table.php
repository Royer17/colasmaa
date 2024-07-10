<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOfficialsToSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->text('officials')->nullable()->after('history');
            $table->text('directory')->nullable()->after('officials');
            $table->text('planning_and_organization')->nullable()->after('directory');
            $table->text('directives')->nullable()->after('planning_and_organization');
            
            $table->string('facebook_tourism')->nullable()->after('directives');
            $table->string('tiktok_tourism')->nullable()->after('facebook_tourism');
            $table->string('instagram_tourism')->nullable()->after('tiktok_tourism');
            $table->string('youtube_tourism')->nullable()->after('instagram_tourism');
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
            $table->dropColumn('officials');
            $table->dropColumn('directory');
            $table->dropColumn('planning_and_organization');
            $table->dropColumn('directives');
            $table->dropColumn('facebook_tourism');
            $table->dropColumn('tiktok_tourism');
            $table->dropColumn('instagram_tourism');
            $table->dropColumn('youtube_tourism');
        });
    }
}
