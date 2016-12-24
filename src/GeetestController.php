<?php
namespace think\geetest;

use think\Config;
use think\Session;
use think\geetest\GeetestLib;

class GeetestController
{

    public function index()
    {
        $geetest = new GeetestLib((array) Config::get('geetest'));
        Session::set('geetest_userid', $_SERVER['REQUEST_TIME']);
        Session::set('geetest_status', $geetest->pre_process(Session::get('geetest_userid')));
        return  $geetest->get_response_str();
    }
}