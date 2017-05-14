<?php

namespace App\Http\Middleware;

use Closure;
use EasyWeChat\Foundation\Application;

class AdminWechatLogin
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

            $oauth = [
                'scopes'   => ['snsapi_login'],
                'callback' => '/admin_wechat_callback',
            ];
            \Config::set('pcwechat.wechat_callback.oauth',$oauth);

            $app = new Application(config('pcwechat.wechat_callback'));
            $oauth = $app->oauth;
            return $oauth->redirect();
        }
        return $next($request);
    }
}
