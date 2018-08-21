<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNullableActionitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('actionitems', function (Blueprint $table) {
        //
            $table->string('index1text', 255)->nullable()->change();
            $table->string('index2text', 255)->nullable()->change();
            $table->boolean('index2use')->nullable()->change();
            $table->string('index3text', 255)->nullable()->change();
            $table->boolean('index3use')->nullable()->change();
            $table->boolean('from')->nullable()->change();
            $table->boolean('to')->nullable()->change();
            $table->boolean('text')->nullable()->change();
            $table->boolean('value')->nullable()->change();
            $table->boolean('checkbox')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
