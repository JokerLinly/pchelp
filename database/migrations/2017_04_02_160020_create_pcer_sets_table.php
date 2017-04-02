<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePcerSetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pcer_sets', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('style')->default(0)->index()->comment('0是年级名称,1是宿舍楼名称');
            $table->tinyInteger('state')->default(1)->comment('状态');
            $table->string('name')->comment('名称');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pcer_sets');
    }
}
