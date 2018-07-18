<?php

namespace App\Http\Controllers;

use Validator;
use Request;
use Session;
use Illuminate\Support\Facades\Input;

class RebateController extends Controller
{
    public function list()
    {
        //最新动态
        $myBody = ['type' => 4, 'limit' => 5];
        //产品信息
        $newActive = myRequest('POST', 'news', ['form_params' => $myBody]);
        $newActive = json_decode($newActive);
        if ($newActive->errorno) {
            $viewinfo['newActive'] = $newActive->rtndata;
        }
        //今日头条
        $myBody = ['type' => 1, 'limit' => 2];
        $today = myRequest('POST', 'news/some', ['form_params' => $myBody]);
        $today = json_decode($today);
        if ($today->errorno) {
            $viewinfo['newActive'] = $today->rtndata;
        }
        //热门排行 
        $myBody = ['type' => 2, 'limit' => 8];
        $hotlist = myRequest('POST', 'news/some', ['form_params' => $myBody]);
        $hotlist = json_decode($hotlist);
        if ($hotlist->errorno) {
            $viewinfo['hotlist'] = $hotlist->rtndata;
        }
        
        return view('messages', $viewinfo);
    }

    public function show($nid)
    {
        $viewinfo = [];
        $myBody = ['nid' => $nid];
        $news = myRequest('POST', 'news/getone', ['form_params' => $myBody]);
        // print_r($news);exit;
        $news = json_decode($news);
        if ($news->errorno) {
            $viewinfo['news'] = $news->rtndata;
        }
        return view('messagesDetails', $viewinfo);
    }

    /**
     * 添加回执单
     */
    public function add(Request $request)
    {
        $uid = Session::get('user.uid', 0);
        // print_r(Input::all());exit;
        // $rules = [
        //     'target_name' => 'required',
        //     'money' => 'required',
        //     'invest_time' => 'required',
        //     // 'verifyCode' => 'required|verify_code',
        // ];
        // $messages = [
        //     'mobile.required' => '请输入您的手机号',
        //     'verifyCode.required' => '验证码不能为空',
        //     'password.required' => '密码未传',
        //     'target_name.required' => '平台不能为空',
        //     'money.required' =>'金额不能为空',
        //     'verifyCode.verify_code' => '验证码错误'
        // ];
        // $validator = Validator::make(Input::all(), $rules, $messages);
        // if($validator->fails()) {
        //     return response()->json([
        //         'errorno' => 0,
        //         'rtndata' => $validator->errors()
        //     ]);
        // }

        //平台名称
        $targetName = Input::post('platName','');
        //平台id
        $platId = Input::post('platId', '');
        //银行卡
        $bankid = Input::post('cardNo',0);

        //投资金额
        $amount = array_filter(Input::post('amount', 0));
        //投资平台手机号
        $phone = array_filter(Input::post('phone', ''));
        //投资时间
        $investTime = array_filter(Input::post('invest_time', ''));
        //首投复投
        $type = array_filter(Input::post('type', 0));
        //投资期限
        $peroid = array_filter(Input::post('peroid', ''));
        if (!$targetName || !$platId || !$bankid || !$amount || !$phone || !$investTime || !$type) {
            return response()->json([
                'errorno' => -1,
                'rtndata' => '参数错误'
            ]);
        }
        $count = count(array_filter($amount));
        $rebateList = [];
        foreach ($amount as $key => $value) {
            // $curRebate->userId = $uid;
            // $curRebate->platId = $platId;
            // $curRebate->plat = $targetName;
            // $curRebate->amount = $amount[$key];
            // $curRebate->phone = $phone[$key];
            // $curRebate->investTime = date('Y/m/d', strtotime($investTime[$key]));
            // $curRebate->investType = $type[$key];
            // $curRebate->targetInfoDuration = $peroid[$key];
            $curRebate = [
                'userId' => $uid,
                'platId' => $platId,
                'plat' => $targetName,
                'amount' => $amount[$key],
                'phone' => $phone[$key],
                'investTime' => date('Y-m-d', strtotime($investTime[$key])),
                'investType' => $type[$key],
                'targetInfoDuration' => $peroid[$key]
            ];
            $curRebate = (object) $curRebate;
            $rebateList[] = $curRebate;
        }
        // $rebateList = (object) $rebateList;
        $newRebateList['rebateList'] = $rebateList;
        $newRebateList = (object) $newRebateList;
        // print_r($newRebateList);exit;

        $rebate = myRequest2('POST', 'apply/rebate', ['json' => $newRebateList]);
        $res = json_decode($rebate);
        // print_r($res);exit;
        if ($res->code != 200) {
            return response()->json([
                'errorno' => $res->code,
                'rtndata' => $res->msg
            ]);
        }

        return response()->json([
                'errorno' => 0,
                'rtndata' => $res->msg
            ]);

        // print_r($myBody);exit;
        // $rebate = myRequest2('POST', 'rebate/rebateApply', ['json' => $myBody]);
        // $res = json_decode($rebate);
        // if ($res->code != 200) {
        //     return response()->json([
        //         'errorno' => $res->code,
        //         'rtndata' => $res->msg
        //     ]);
        // }

        // return response()->json([
        //         'errorno' => 0,
        //         'rtndata' => $res->msg
        //     ]);
        
    }
}
