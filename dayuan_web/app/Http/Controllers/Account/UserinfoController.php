<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class UserinfoController extends Controller
{
    public function info(Request $request)
    {
        //用户银行列表
        $rebate = myRequest2('GET', 'getAllBankName');
        $rebate = json_decode($rebate);
        if ($rebate->code == 200) {
            $banklist = $rebate->data;
            $viewinfo['banklist'] = $banklist->bankList;
        }
        //用户绑卡情况
        $uid = $request->session()->get('user.uid', 0);
        $myBody = [
            'userId' => $uid
        ];
        $rebate = myRequest2('POST', '/api/pc/account/settings', ['form_params' => $myBody]);
        $rebate = json_decode($rebate);
        $viewinfo['bankinfo'] = [];
        if ($rebate->code == 200) {
            $viewinfo['bankinfo'] = $rebate->data;
        }
        return view('material', $viewinfo);
    }

    /**
     * 用户认证
     */
    public function user_verify()
    {

    }

    /**
     * 银行卡认证
     */
    public function bank_add(Request $request)
    {
        $uid = $request->session()->get('user.uid', 0);
        $bank = Input::post('bank', '');
        $userName = Input::post('userName', '');
        $cardNo = Input::post('cardNo', '');
        $province = Input::post('province', '');  
        $city = Input::post('city', '');    
        $area = Input::post('area', '');    
        $acronym = Input::post('Acronym', '');
        $myBody = [
            'userId' => $uid,
            'bank' => $bank,
            'userName' => $userName,
            'cardNo' => $cardNo,
            'province' => $province,
            'cardNo' => $cardNo,
            'province' => $province,
            'city' => $city,
            'area' => $area,
            'bankAcronym' => $acronym
        ];
        // print_r($myBody);exit;
        $res = myRequest2('POST', '/api/pc/bind/bank', ['form_params' => $myBody]);
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

    /**
     * 密码修改
     */
    public function passwordChange(Request $request)
    {
        $uid = $request->session()->get('user.uid', 0);

        $oldPwd = Input::post('old_password', '');
        $newPwd = Input::post('new_password', '');
        $new_pwdAgain = Input::post('new_pwdAgain', '');
        //查看用户的收益
        $myBody = [
            'userId' => $uid,
            'oldPwd' => $oldPwd,
            'newPwd' => $new_pwdAgain
        ];
        // print_r($myBody);exit;
        $res = myRequest2('POST', 'user/pwdModify', ['json' => $myBody]);
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
