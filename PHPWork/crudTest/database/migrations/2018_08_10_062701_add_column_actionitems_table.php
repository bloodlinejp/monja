<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnActionitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('actionitems', function (Blueprint $table) {
            //ユーザIDカラムをIDの後に追加
            $table->integer('user_id')->after('id')->comment('ユーザID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('actionitems', function (Blueprint $table) {
            //
        });
    }
}
