<?php

namespace App\Http\Controllers;

use Session;
use App\Models\UserAccount;

class IndexController extends Controller
{
    public function index()
    {
        $viewinfo = ['islogin' => 0];
        $islogin = Session::get('user.islogin', 0);
        $api_token = Session::get('user.token', null);

        //登录信息
        if ($islogin) {
            $viewinfo['mobile'] = Session::get('user.mobile');
            
        }
        // if(Agent::isMobile()) {
        //     header("Loation:http://twap.wangdaidayuan.com");
        // }

        //首页5个优选产品
        $uid = Session::get('user.uid', 0);
        $res5Selected = myRequest2('GET', 'product/recommendProductList?uid='.$uid);
        $res5Selected = json_decode($res5Selected);
        // print_r($res5Selected);exit;
        if($res5Selected->code == 200) {
            $viewinfo['res5Selected'] = $res5Selected->data;
        }
        
        //热点资讯
        $myBody = ['type' => 1, 'limit' => 10];
        $resNewsHot = myRequest('POST', 'news/some', ['form_params' => $myBody]);
        $resNewsHot = json_decode($resNewsHot);
        if(!$resNewsHot->errorno) {
            $viewinfo['hotNews'] = $resNewsHot->rtndata;
        }
        
        //独家新闻
        $myBody = ['type' => 2, 'limit' => 10];
        $resNewsTop = myRequest('POST', 'news/some', ['form_params' => $myBody]);
        $resNewsTop = json_decode($resNewsTop);
        if(!$resNewsTop->errorno) {
            $viewinfo['onlyNews'] = $resNewsTop->rtndata;
        }

        //行业新闻
        $myBody = ['type' => 3, 'limit' => 10];
        $resNewsActivity = myRequest('POST', 'news/some', ['form_params' => $myBody]);
        $resNewsActivity = json_decode($resNewsActivity);
        if(!$resNewsActivity->errorno) {
            $viewinfo['industryNews'] = $resNewsActivity->rtndata;
        } 

        //政策新闻
        $myBody = ['type' => 4, 'limit' => 1];
        $policyNews = myRequest('POST', 'news/some', ['form_params' => $myBody]);
        $policyNews = json_decode($policyNews);
        if(!$policyNews->errorno) {
            $viewinfo['policyNews'] = $policyNews->rtndata;
        }  

        //通知
        $res = myRequest2('GET', 'notice/investNoticeList');
        $res = json_decode($res);
        // print_r($res);exit;
        if ($res->code != 200) {
            $noticelist = [];
        }
        $noticelist = $res->data->noticeList;
        $viewinfo['noticelist'] = $noticelist;
    
        //如果是手机端，用手机的view层
        // if(is_mobile()) {
        //     return 1;
        // }
        return view('index', $viewinfo);
    }

    public function notice()
    {
        $res = myRequest2('GET', 'notice/investNoticeList');
        $res = json_decode($res);
        // print_r($res);exit;
        if ($res->code != 200) {
            return response()->json([
                'errorno' => $res->code,
                'rtndata' => $res->msg
            ]);
        }
        return response()->json([
                'errorno' => 0,
                'rtndata' => $res->data
            ]);
    }
}
