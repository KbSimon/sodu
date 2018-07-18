<?php

/**
 * 封装的curl请求方法
 * @param $method 状态
 * @param $url 地址
 * @param $data 数据
 */

function myRequest($method='GET',$url='', $data=[])
{
    $client = new GuzzleHttp\Client();

    try{
        $res = $client->request($method, Config::get('myconfig.dayuan_php_api').$url, $data);
        // print_r($res->getBody()->getContents());exit;
    } catch (RequestException $e) {
        echo $e->getRequest();
        if ($e->hasResponse()) {
            echo $e->getResponse();
        }
    }
    
    // print_r($res);exit;
    return $res->getBody()->getContents();
}

function myRequest2($method='GET',$url='', $data=[])
{
    $client = new GuzzleHttp\Client();

    try{
        $res = $client->request($method, Config::get('myconfig.dayuan_java_api').$url, $data);
        // print_r($res->getBody()->getContents());exit;
    } catch (RequestException $e) {
        echo $e->getRequest();
        if ($e->hasResponse()) {
            echo $e->getResponse();
        }
    }
    
    // print_r($res);exit;
    return $res->getBody()->getContents();
}


// if (!function_exists('is_mobile')) {
//     function is_mobile()
//     {
//         $session = app()->make('Illuminate\Contracts\Session\Session');
//         return $session->get('mobile') == true;
//     }
// }
// if (!function_exists('is_desktop')) {
//     function is_desktop()
//     {
//         $session = app()->make('Illuminate\Contracts\Session\Session');
//         return $session->get('mobile') == false;
//     }
// }