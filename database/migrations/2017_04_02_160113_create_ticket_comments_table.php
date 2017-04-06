<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ticket_id')->index()->comment('关联 Ticket 主键');
            $table->tinyInteger('from')->comment('0是用户 1是pc队员给管理员 2是pc队员给用户 3是pc管理员发给该订单的用户 4是pc管理员发给该订单负责的队员');
            $table->tinyInteger('state')->default(0)->comment('1是已发送模板消息');
            $table->integer('wcuser_id')->index()->comment('关联微信用户');
            $table->text('text')->comment('聊天内容');
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
        Schema::dropIfExists('ticket_comments');
    }
}
