<?php

namespace App\Http\Middleware;

use Closure;

class WechatLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$request->session()->has('wechat_user')) {

            return $request->action('WeChatController@getWechatUserSession');
        }
        return $next($request);
    }
}
