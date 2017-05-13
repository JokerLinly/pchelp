<?php

namespace App\Http\Middleware;

use Closure;
use WeChatSystem;

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
            if (!Cache::has('openid')) {
                dd('迟点再做');
            }
            $openid = Cache::get('openid');
            WeChatSystem::putWechatSession($openid);
        }
        return $next($request);
    }
}
