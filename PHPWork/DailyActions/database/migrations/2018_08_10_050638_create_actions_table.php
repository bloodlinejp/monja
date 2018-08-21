<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actions', function (Blueprint $table) {
            $table->increments('id')->comment('主キー');
            $table->date('date')->comment('活動日');
            $table->integer('actionitem_id')->comment('項目番号');
            $table->time('from')->comment('時刻From');
            $table->time('to')->comment('時刻To');
            $table->string('text', 255)->comment('文字列');
            $table->decimal('value', 8, 2)->comment('数値');
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
        Schema::dropIfExists('actions');
    }
}
