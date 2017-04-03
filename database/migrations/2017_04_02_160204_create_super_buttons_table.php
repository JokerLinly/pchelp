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
            $table->string('type_name')->comment('开启按钮时图文的标题 && 按钮名称');
            $table->string('description')->comment('开启按钮时返回图文的描述')->nullable();
            $table->string('img_url')->default('https://mmbiz.qlogo.cn/mmbiz/OEpqnOUyYjMcqqpJBRh2bhFDWTXUL3fdT54e7HTLTzEyEfzXk8XTUJQsrFx5pHvC7v6eSDNLicse62Hvpwt4o0A/0')->comment('开启按钮时返回图文的图片')->nullable();
            $table->string('close_message')->default('现在暂时不接受预约谢谢！')->nullable();
            $table->string('close_tyle')->default('0')->nullable();
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
