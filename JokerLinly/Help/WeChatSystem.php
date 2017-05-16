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
     * @return object        [description]
     */
    public static function getButtonInfoByType(int $type)
    {
        $button_info = WeChatFactory::getButtonInfoByType($type);
        return $button_info;
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
     * @param  [string] $mediaId [mediaId]
     * @return [json]         [description]
     */
    public static function answerContent($style, $mediaId)
    {
        if ($style == 2) {
            return new EasyWeChat\Message\Image(['media_id' => $mediaId]);
        } elseif ($style == 0) {
            return new EasyWeChat\Message\Text(['content' => $mediaId]);
        } elseif ($style == 1) {
            return new EasyWeChat\Message\Material('mpnews', $mediaId);
        } elseif ($style == 3) {
            return new EasyWeChat\Message\Material('voice', $mediaId);
        }
    }

    /**
     * 微信消息回复
     * @author JokerLinly 2017-04-02
     * @param  [string] $content [description]
     * @return [type]          [description]
     */
    public static function text($content)
    {
        $AlltextRely = WeChatFactory::getRelyByState(1);//获取用户发送消息时自动回复的内容
        if ($AlltextRely) {
            return $this->answerContent($AlltextRely->style, $AlltextRely->answer);
        } elseif ($content=='骏哥哥好帅') {
            $news = new News([
                'title'       => 'PC仔信息登记',
                'description' => 'PC仔申请通道',
                'url'         => action('WechatController@pcer'),
                'image'       => 'https://mmbiz.qlogo.cn/mmbiz/OEpqnOUyYjMcqqpJBRh2bhFDWTXUL3fdT54e7HTLTzEyEfzXk8XTUJQsrFx5pHvC7v6eSDNLicse62Hvpwt4o0A/0',
            ]);
            return $news;
        } else {
            //获取精确搜索内容
            $full_match = WeChatFactory::getFullMatch($content);
            if (empty($full_match)) {
                //获取模糊匹配内容
                $half_match = WeChatFactory::getHalfMatch($content);
                if (!empty($half_match)) {
                    return $this->answerContent($half_match->style, $half_match->answer);
                }
            }
            return null;
        }
    }

    /**
     * 保存微信用户的 Session
     * @author JokerLinly 2017-05-09
     * @param  [type] $user [description]
     * @return [type]       [description]
     */
    public static function putWechatSessionByOpenid($openid)
    {
        $user = EasyWeChat::user()->get($openid);
        $user_info = WeChatFactory::getWechatUser($user);
        $wechat_user = [
            'id'              => $user_info->id,
            'state'           => $user_info->state,
            'openid'          => $user_info->openid,
            'image_url'       => $user_info->image_url,
            'wechat_nickname' => $user_info->wechat_nickname,
        ];
        \Session::put('wechat_user', $wechat_user);
        \Session::save();
        return $wechat_user;
    }

    /**
     * admin Session
     * @author JokerLinly 2017-05-14
     * @param  [type] $user [description]
     * @return [type]       [description]
     */
    public static function putAdminSession($user)
    {
        $user_info = WeChatFactory::getWechatUser($user);
        $wechat_user = [
            'id'              => $user_info->id,
            'state'           => $user_info->state,
            'openid'          => $user_info->openid,
            'image_url'       => $user_info->image_url,
            'wechat_nickname' => $user_info->wechat_nickname,
        ];
        \Session::put('wechat_user', $wechat_user);
        \Session::save();
        return $wechat_user;
    }

    /**
     * 根据 openid 获取用户信息
     * @author JokerLinly 2017-05-14
     * @param  [type] $openid [description]
     * @return [type]         [description]
     */
    public static function getUserByOpenid($openid)
    {
        $user_info = WeChatFactory::getUserByOpenid($openid);
        return $user_info;
    }
}
