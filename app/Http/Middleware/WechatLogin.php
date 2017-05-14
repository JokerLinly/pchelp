<?php

namespace App\Http\Middleware;

use Closure;
use Redirect;
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
            $callback_uri = $request->server('REQUEST_URI');
            return Redirect::action('WeChatController@getWechatUserSession', ['callback_uri'=> $callback_uri]);
        }
        return $next($request);
    }
}
