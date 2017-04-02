<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeChatReliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('we_chat_relies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->comment('自动回复标题');
            $table->string('question')->nullable()->comment('关键词');
            $table->tinyInteger('style')->default(0)->comment('0是文本 1是图文 2是图片 3是语音');
            $table->string('answer')->nullable()->comment('自动回复内容');
            $table->tinyInteger('state')->default(0)->comment('判断自动回复属性，0是被添加自动回复，1是消息自动回复，2是全匹配式关键词自动回复，3是模糊匹配式关键词自动回复');
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
        Schema::dropIfExists('we_chat_relies');
    }
}
