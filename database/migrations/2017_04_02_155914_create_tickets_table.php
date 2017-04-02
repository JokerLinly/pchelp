<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('wcuser_id')->index()->comment('关联微信用户主键id');
            $table->string('name')->comment('报修人姓名');
            $table->string('number')->comment('报修人联系方式');
            $table->string('shortnum')->nullable()->comment('校园短号');
            $table->tinyInteger('area')->index()->default(0)->comment('0是东区 1是西区');
            $table->string('address')->comment('兼容旧数据，报修人具体地址');//
            $table->integer('address_id')->default(0)->index()->comment('关联 help_range 主键');//报修人具体地址

            $table->tinyInteger('date')->index()->comment('代表星期');
            $table->string('hour')->comment('代表上门时间段');

            $table->tinyInteger('date1')->nullable()->index()->comment('代表星期');
            $table->string('hour1')->nullable()->comment('代表上门时间段');

            $table->string('problem')->comment('报修原因');

            $table->integer('pcer_id')->nullable()->index()->comment('关联 PC 志愿者');
            $table->integer('pcadmin_id')->nullable()->index()->comment('关联 PC 管理员');

            $table->tinyInteger('state')->default(0)->index()->comment('1订单未完成 2PC仔结束订单 3机主结束订单 4 管理员结束订单 5super结束订单');
            $table->tinyInteger('status')->default(0)->comment('机主报修、队员报修');
            $table->tinyInteger('assess')->nullable()->index()->comment('1好评 2中评 3差评');
            $table->string('suggestion')->nullable()->comment('机主意见');
            $table->string('over_reason')->nullable()->comment('由队员关闭订单需要增加此字段');
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
        Schema::dropIfExists('tickets');
    }
}
