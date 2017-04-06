<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use WeChatSystem;
use EasyWeChat;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (WeChatSystem::getButtonInfoByType(1)) {
            $news = new EasyWeChat\Message\News([
                'title'       => 'PC仔信息登记',
                'description' => 'PC仔申请通道',
                'url'         => action('Wap\User\TicketController@index',['type_name'=> 'dsfdsf']),
                'image'       => 'https://mmbiz.qlogo.cn/mmbiz/OEpqnOUyYjMcqqpJBRh2bhFDWTXUL3fdT54e7HTLTzEyEfzXk8XTUJQsrFx5pHvC7v6eSDNLicse62Hvpwt4o0A/0',
            ]);
            dd($news);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
