<?php

namespace App\Http\Middleware;

use Closure;
use Redirect;
use WeChatSystem;
use EasyWeChat\Foundation\Application;

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
            \Session::put('callback_uri', $request->server('REQUEST_URI'));
            \Session::save();

            $app = new Application(config('pcwechat.wechat_callback'));
            $oauth = $app->oauth;
            return $oauth->redirect();
        }
        return $next($request);
    }
}
