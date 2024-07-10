<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSocialNetworksToSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->string('facebook')->nullable()->after('tributes');
            $table->string('tiktok')->nullable()->after('facebook');
            $table->string('instagram')->nullable()->after('tiktok');
            $table->string('youtube')->nullable()->after('instagram');

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
            $table->dropColumn('facebook');
            $table->dropColumn('tiktok');
            $table->dropColumn('instagram');
            $table->dropColumn('youtube');
        });
    }
}
