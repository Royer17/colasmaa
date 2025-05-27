<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangePositionToNullableOnUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('position')->nullable()->change();
            $table->string('cellphone')->nullable()->change();
            $table->string('correo')->nullable()->change();
            $table->smallInteger('ventanilla')->default(0)->change();
            $table->unsignedInteger('office_id')->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('position')->change();
            $table->string('cellphone')->change();
            $table->string('correo')->change();
            $table->smallInteger('ventanilla')->change();
            $table->unsignedInteger('office_id')->change();
        });
    }
}
