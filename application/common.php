<?php

/**
 * 公共函数文件
 */

//redis
function redis($cache='cache', $name = false)
{
    return \think\Cache::connect(config($cache), $name);
}

//请求函数
function vcurl($url, $post = '', $with_ssl = false)
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_AUTOREFERER, 1);

    if ($post) {
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $post);
    }

    //扩展ssl
    if($with_ssl) {

        curl_setopt($curl, CURLOPT_TIMEOUT, 3000);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 300);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
    }


    curl_setopt($curl, CURLOPT_TIMEOUT, 10);
    curl_setopt($curl, CURLOPT_HEADER, 0);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $res = curl_exec($curl);

    if (curl_errno($curl)) {
        //echo '<pre><b>错误:</b><br />' . curl_error($curl);
    }
    curl_close($curl);
    return $res;
}