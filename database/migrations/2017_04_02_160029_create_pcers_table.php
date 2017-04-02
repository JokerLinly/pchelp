<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePcersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pcers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('wcuser_id')->index();
            $table->string('name')->comment('队员姓名');
            $table->string('nickname')->comment('对外昵称');
            $table->string('school_id')->comment('学号');
            $table->integer('pcerlevel_id')->comment('年级id');
            $table->string('long_number')->comment('长号');
            $table->string('number')->nullable()->comment('短号');
            $table->string('department')->comment('学系');
            $table->string('major')->comment('专业');
            $table->string('clazz')->comment('班级');
            $table->string('address')->comment('具体地址');
            $table->integer('address_id')->default(0)->comment('具体地址id');
            $table->tinyInteger('area')->default(0)->comment('0是东区 1是西区');
            $table->tinyInteger('state')->default(0)->comment('0是值班 1是不值班');
            $table->tinyInteger('sex')->default(0)->comment('0是男 1是女');
            $table->tinyInteger('ot')->default(0)->comment('0是不加班 1是加班');
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
        Schema::dropIfExists('pcers');
    }
}
