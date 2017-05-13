<?php

namespace JokerLinly\Help\Factory;

use JokerLinly\Help\Models\SuperButton;
use JokerLinly\Help\Models\WeChatRely;
use JokerLinly\Help\Models\WeChatUser;

/**
* 用户工厂
*/
class WeChatFactory
{
    /**
     * getButtonInfoByType
     * @author JokerLinly 2017-04-02
     * @param  [int] $type [type]
     * @return [object]       [description]
     */
    public static function getButtonInfoByType(int $type)
    {
        return SuperButton::where('type', $type)->first();
    }

    /**
     * getRelyByState
     * @author JokerLinly 2017-04-02
     * @param  int    $state [state]
     * @return [object]        [description]
     */
    public static function getRelyByState(int $state)
    {
        return WeChatRely::where('state', $state)->first();
    }

    /**
     * getFullMatch
     * @author JokerLinly 2017-04-02
     * @param  [string] $content [description]
     * @return [object]          [description]
     */
    public static function getFullMatch($content)
    {
        return WeChatRely::where('state',2)->where('question', $content)->first();
    }

    /**
     * getHalfMatch
     * @author JokerLinly 2017-04-02
     * @param  [string] $content [description]
     * @return [boolean or object]          [description]
     */
    public static function getHalfMatch($content)
    {
        $half_match = WeChatRely::where('state',3)->get();
        if ($half_match) {
            foreach ($half_match as $value) {
                if (strstr($content,$value->question)) {
                    return $value;
                }
            }
        }
        return null;
    }

    /**
     * 创建 Or 更新微信用户信息
     * @author JokerLinly 2017-05-09
     * @param  [type] $user_data [description]
     * @return [type]            [description]
     */
    public static function getWechatUser($user_data)
    {
        $where = ['openid' => $user_data['openid']];
        $update = [
            'wechat_nickname' => empty($user_data['nickname']) ? : $user_data['nickname'],
            'subscribe'       => empty($user_data['subscribe']) ? : $user_data['subscribe'],
            'image_url'       => empty($user_data['nickname']) ? : $user_data['headimgurl'],
        ];

        $user_info = WeChatUser::updateOrCreate($where, $update);
        return $user_info;
    }
}
