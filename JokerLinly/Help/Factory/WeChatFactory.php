<?php

namespace JokerLinly\Help\Factory;

use JokerLinly\Help\Models\SuperButton;
use JokerLinly\Help\Models\WeChatRely;

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
}
