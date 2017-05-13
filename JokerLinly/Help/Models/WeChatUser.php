<?php

namespace JokerLinly\Help\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WeChatUser extends Model
{
    use SoftDeletes;

    protected $fillable = ['wechat_nickname', 'openid', 'subscribe', 'image_url'];
}
