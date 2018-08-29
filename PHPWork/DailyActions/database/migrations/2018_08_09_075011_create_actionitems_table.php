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
        Schema::create('action_items', function (Blueprint $table) {
            $table->increments('id')->comment('主キー');
            $table->unsignedInteger('user_id')->comment('ユーザID');
            $table->unsignedInteger('order')->nullable()->comment('表示順序');
            $table->string('index1text', 255)->nullable()->comment('大見出し文言');
            $table->string('index2text', 255)->nullable()->comment('中見出し文言');
            $table->boolean('index2use')->nullable()->comment('中見出し使用設定');
            $table->string('index3text', 255)->nullable()->comment('小見出し文言');
            $table->boolean('index3use')->nullable()->comment('小見出し使用設定');
            $table->boolean('from')->nullable()->comment('時刻From使用設定');
            $table->boolean('to')->nullable()->comment('時刻To使用設定');
            $table->boolean('text')->nullable()->comment('文字列使用設定');
            $table->unsignedInteger('lines')->nullable()->comment('行数');
            $table->boolean('value')->nullable()->comment('数値使用設定');
            $table->boolean('checkbox')->nullable()->comment('チェックボックス');
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
        Schema::dropIfExists('action_items');
    }
}
