<?php

namespace App\Http\Controllers;

use EasyWeChat;
use Illuminate\Http\Request;
use WeChatSystem;
use Session;

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
            if (!Cache::has('openid')) {
                Cache(['openid' => $message->FromUserName], 1440);
            }
            /*判断事件类型*/
            if ($message->MsgType == 'event') {
                //关注事件
                if ($message->Event == 'subscribe') {
                    return WeChatSystem::subscribe();
                }

                // 点击事件
                if ($message->Event=='CLICK' && in_array($message->EventKey, config('pcwechat.event_key'))) {

                    $type = array_search($message->EventKey, config('pcwechat.event_key'));
                    // 按钮是否打开
                    $button_info = WeChatSystem::getButtonInfoByType($type);
                    if ($button_info->type_state == 1) {
                        $news = new EasyWeChat\Message\News([
                            'title'       => $button_info->type_name? $button_info->type_name : '预约报修',
                            'description' => $button_info->description? $button_info->description : '预约报修',
                            'url'         => action('Wap\User\TicketController@index', ['type_name'=>$message->EventKey]),
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

    /**
     * 网页授权登陆
     * @author JokerLinly 2017-05-09
     * @return [type] [description]
     */
    public function getWechatUserSession(EasyWeChat\Foundation\Application $app, Request $request)
    {
        $user = $app->oauth->scopes(['snsapi_base'])->user();
        WeChatSystem::putWechatSession($user);
        return redirect($request->header('referer'));
    }
}
