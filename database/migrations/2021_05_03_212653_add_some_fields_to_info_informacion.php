<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSomeFieldsToInfoInformacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('info_informacion', function (Blueprint $table) {
            $table->string('slug')->after('vc_titulo_informacion');
            $table->string('foto_path')->after('foto');
            $table->string('foto1_path')->after('foto1');
            $table->string('foto2_path')->after('foto2');
            $table->string('foto3_path')->after('foto3');
            $table->string('foto4_path')->after('foto4');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('info_informacion', function (Blueprint $table) {
            $table->dropColumn('slug');
            $table->dropColumn('foto_path');
            $table->dropColumn('foto1_path');
            $table->dropColumn('foto2_path');
            $table->dropColumn('foto3_path');
            $table->dropColumn('foto4_path');
        });
    }
}
