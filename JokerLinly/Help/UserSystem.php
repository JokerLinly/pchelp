<?php

namespace JokerLinly\Help;

/**
*  UserSystem
*/
class UserSystem
{
    /**
     * 报修页面信息
     * @author JokerLinly 2017-05-13
     * @param  [type] $type_name [description]
     * @return [type]            [description]
     */
    public function entryType($type_name)
    {
        return $type_name;
    }

    /**
     * 用户订单信息
     * @author JokerLinly 2017-05-13
     * @param  [type] $user_type [description]
     * @return [type]            [description]
     */
    public function myticketType($user_type)
    {
        return $user_type;
    }
}
