<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnActionItemsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('action_items', function (Blueprint $table) {
      //文字列改行ありの行数カラムを文字列の後に追加
      $table->integer('lines')->nullable()->after('text')->comment('行数');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('action_items', function (Blueprint $table) {
      //
    });
  }
}
