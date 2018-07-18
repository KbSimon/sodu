<?php
/**
 * 帐户总览
 */
namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class OverviewController extends Controller
{
    public function account(Request $request)
    {
        //查看用户的收益
        $uid = $request->session()->get('user.uid', 0);
        $myBody = ['userId' => $uid];
        $news = myRequest2('POST', 'api/pc/account', ['form_params' => $myBody]);
        $news = json_decode($news);
        if ($news->code == 200) {
            $viewinfo['accountinfo'] = $news->data;
        }
        // print_r($viewinfo['accountinfo']);exit;
        //返利平台列表
        $platformlist = myRequest2('GET', 'plat/platDetailIdAndName');
        $platformlist = json_decode($platformlist);
        if ($platformlist->code == 200) {
            $viewinfo['platformlist'] = $platformlist->data->platInfoList;
        }
        // print_r($viewinfo);exit;
        return view('account', $viewinfo);
    }

    public function tixian(Request $request)
    {
        $uid = $request->session()->get('user.uid', 0);
        $money = $request->input('money', 0);
        $myBody = [
            'userId' => $uid,
            'price' => $money,
            'type' => 3
        ];
        $res = myRequest2('POST', '/api/pc/insertbill', ['form_params' => $myBody]);
        $res = json_decode($res);
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
    }   

}
