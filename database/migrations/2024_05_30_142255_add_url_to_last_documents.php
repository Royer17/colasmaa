<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUrlToLastDocuments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('last_documents', function (Blueprint $table) {
            $table->text('description')->nullable()->after('slug');
            $table->string('url')->nullable()->after('acronym');
            $table->string('image')->nullable()->after('url');
            $table->string('external_image')->nullable()->after('image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('last_documents', function (Blueprint $table) {
            $table->dropColumn('description');
            $table->dropColumn('url');
            $table->dropColumn('image');
            $table->dropColumn('external_image');
        });
    }
}
