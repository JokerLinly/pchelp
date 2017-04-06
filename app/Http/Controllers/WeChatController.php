<?php

namespace App\Http\Controllers;

use EasyWeChat;
use Illuminate\Http\Request;
use WeChatSystem;

class WeChatController extends Controller
{
    /**
     * 处理微信的请求消息
     * @author JokerLinly 2017-04-02
     * @return
     */
    public function serve()
    {
        $server = EasyWeChat::server();
        $server->setMessageHandler(function ($message) {
            /*判断事件类型*/
            if ($message->MsgType == 'event') {
                //关注事件
                if ($message->Event == 'subscribe') {
                    return WeChatSystem::subscribe();
                }

                $event_key = ['PChelp_Daytime', 'PChelp_Night', 'PChelp_Volunteer'];

                // 点击事件
                if ($message->Event=='CLICK' && in_array($message->EventKey, $event_key)) {
                    switch ($message->EventKey) {
                        case 'PChelp_Night':
                            $type = 1;
                            break;
                        case 'PChelp_Daytime':
                            $type = 2;
                            break;
                        case 'PChelp_Volunteer':
                            $type = 3;
                            break;
                    }

                    // 按钮是否打开
                    $button_info = WeChatSystem::getButtonInfoByType($type);
                    if ($button_info->type_state == 1) {
                        $news = new EasyWeChat\Message\News([
                            'title'       => $button_info->type_name? $button_info->type_name : '预约报修',
                            'description' => $button_info->description? $button_info->description : '预约报修',
                            'url'         => action('TicketController@index', ['type_name'=>$message->EventKey]),
                            'image'       => $button_info->img_url,
                        ]);
                        return $news;
                    }

                    if ($button_info->close_message) {
                        return WeChatSystem::answerContent($button_info->close_tyle, $button_info->close_message);
                    }
                }
            }

            if ($message->MsgType == 'text') { // 用户发送消息
                return WeChatSystem::text($message->Content);
            }
        });

        $response = $server->serve();

        return  $response;
    }
}
