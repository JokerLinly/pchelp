<?php

namespace App\Http\Controllers\Wap\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JokerLinly\Help\UserSystem;

class TicketController extends Controller
{
    protected $user;

    public function __construct(UserSystem $user)
    {
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($type_name)
    {
        if (in_array($type_name, config('pcwechat.event_key'))) {
            $response_data = $this->user->entryType($type_name);
            return view('ticket.'.$type_name.'.index', compact('response_data'));
        }
        return abort(404);
    }

    /**
     * Mytickets Wap center
     * @author JokerLinly 2017-05-13
     * @return [type] [description]
     */
    public function home()
    {
        $user_info = \Session::get('wechat_user');
        $user_type = config('pcwechat.user_type')[$user_info['state']];
        if (empty($user_type)) {
            return abort(404);
        }
        $response_data = $this->user->myticketType($user_type);
        return view('myticket.'.$user_type.'.index', compact('response_data'));
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
