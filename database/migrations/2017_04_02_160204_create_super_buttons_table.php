<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuperButtonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('super_buttons', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('type')->comment('按钮类型');
            $table->tinyInteger('type_state')->comment('按钮状态');
            $table->string('type_name')->comment('按钮名称');
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
        Schema::dropIfExists('super_buttons');
    }
}
