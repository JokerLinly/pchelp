<?php

namespace App\Http\Controllers\Wap\Super;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        dd(\Session::get('wechat_user'));
    }
}
