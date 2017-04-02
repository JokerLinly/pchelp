<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeChatUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('we_chat_users', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('state')->default(0)->index()->comment('用户属性，0是普通用户，1是 PC队员，2是PC管理员，3是超级管理员');
            $table->string('openid')->index();
            $table->tinyInteger('subscribe')->default(0)->comment('判断微信用户是否关注，0是未关注，或者已经取消关注，1是已关注');
            $table->string('image_url')->default('img/pis.jpg');
            $table->string('wechat_nickname')->nullable();
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
        Schema::dropIfExists('we_chat_users');
    }
}
