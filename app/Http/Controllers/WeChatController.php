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
                if ($message->Event=='subscribe') {
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

                    // 上门接单按钮是否打开
                    if (WeChatSystem::isWork($type)) {
                        $news = new EasyWeChat\Message\News([
                            'title'       => '预约上门',
                            'description' => '周一至周五晚 6:00-9:30 可预约 PC 志愿者上门服务',
                            'url'         => action('TicketController@index', ['type_name'=>$message->EventKey]),
                            'image'       => 'https://mmbiz.qlogo.cn/mmbiz/OEpqnOUyYjMcqqpJBRh2bhFDWTXUL3fdT54e7HTLTzEyEfzXk8XTUJQsrFx5pHvC7v6eSDNLicse62Hvpwt4o0A/0',
                        ]);
                        return $news;
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
