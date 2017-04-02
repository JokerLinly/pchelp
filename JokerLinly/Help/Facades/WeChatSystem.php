<?php
namespace JokerLinly\Help\Facades;

use Illuminate\Support\Facades\Facade;

class WeChatSystem extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'WeChatSystem';
    }
}
