<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActionitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actionitems', function (Blueprint $table) {
            $table->increments('id')->comment('主キー');
            $table->string('index1text', 255)->comment('大見出し文言');
            $table->string('index2text', 255)->comment('中見出し文言');
            $table->boolean('index2use')->comment('中見出し使用設定');
            $table->string('index3text', 255)->comment('小見出し文言');
            $table->boolean('index3use')->comment('小見出し使用設定');
            $table->boolean('from')->comment('時刻From使用設定');
            $table->boolean('to')->comment('時刻To使用設定');
            $table->boolean('text')->comment('文字列使用設定');
            $table->boolean('value')->comment('数値使用設定');
            $table->boolean('checkbox')->comment('チェックボックス');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actionitems');
    }
}
