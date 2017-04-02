<?php

namespace JokerLinly\Help;

use JokerLinly\Help\Factory\WeChatFactory;
use EasyWeChat;

/**
*  WeChatSystem
*/
class WeChatSystem
{
    /**
     * mark sure is work
     * @author JokerLinly 2017-04-02
     * @param  [int]  $state [button]
     * @return boolean        [description]
     */
    public static function isWork(int $type)
    {
        $button_info = WeChatFactory::getButtonInfoByType($type);
        if ($button_info && $button_info->type_state == 1) {
            return true;
        }
        return false;
    }

    /**
     * 关注自动回复
     * @author JokerLinly 2017-04-02
     * @return
     */
    public static function subscribe()
    {
        $SubscribeRely = WeChatFactory::getRelyByState(0);//获取关注时自动回复的内容
        if ($SubscribeRely) {
            return $this->answerContent($SubscribeRely->style, $SubscribeRely->answer);
        }
        return "嗨!你好！感谢关注中大南方PC志愿者服务队微信公众号！";
    }

    /**
     * answerContent
     * @author JokerLinly 2017-04-02
     * @param  [int] $style  [style]
     * @param  [string] $answer [answer]
     * @return [json]         [description]
     */
    public static function answerContent($style, $answer)
    {
        # code...
    }

    // /**
    //  * 微信消息回复
    //  * @author JokerLinly 2017-04-02
    //  * @param  [string] $content [description]
    //  * @return [type]          [description]
    //  */
    // public static function text($content)
    // {
    //     $AlltextRely = RelyModule::getRely(1);//获取用户发送消息时自动回复的内容
    //     if (is_array($AlltextRely) && !empty($AlltextRely)) {
    //         if ($AlltextRely['style'] == 2) {
    //             $img = new Image(['media_id' => $AlltextRely['answer']]);
    //             return $img;
    //         }
    //         return $AlltextRely['answer'];
    //     } elseif ($content=='骏哥哥好帅') {
    //         $news = new News([
    //             'title'       => 'PC仔信息登记',
    //             'description' => 'PC仔申请通道',
    //             'url'         => action('WechatController@pcer'),
    //             'image'       => 'https://mmbiz.qlogo.cn/mmbiz/OEpqnOUyYjMcqqpJBRh2bhFDWTXUL3fdT54e7HTLTzEyEfzXk8XTUJQsrFx5pHvC7v6eSDNLicse62Hvpwt4o0A/0',
    //         ]);
    //         return $news;
    //     } else {
    //         //获取精确搜索内容
    //         $full_match = RelyModule::getFullMatch($content);
    //         if (empty($full_match) && !is_array($full_match)) {
    //             //获取模糊匹配内容
    //             $half_match = RelyModule::getHalfMatch($content);
    //             if (!empty($half_match) && is_array($half_match)) {
    //                 return $half_match['answer'];
    //             }
    //         }
    //         return $full_match['answer'];
    //     }
    // }
}
