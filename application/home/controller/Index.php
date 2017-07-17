<?php

namespace app\home\controller;

class Index
{
    public function index()
    {
        $str = '2017-7';
        $time = strtotime($str);
        echo $time;
    }

    public function hello()
    {
        echo "<pre>";
        var_dump(request()->request());
    }
}
