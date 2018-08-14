<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeCommentActionitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('actionitems', function (Blueprint $table) {
            //チェックボックスのコメント変更
					$table->boolean('checkbox')->comment('チェックボックス使用設定')->change();
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
