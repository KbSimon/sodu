<?php
/**
 * 返利申报页
 */
namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class RebateController extends Controller
{
    public function list(Request $request)
    {
        //查看用户的收益
        $uid = $request->session()->get('user.uid', 0);
        $myBody = ['userId' => $uid];
        $rebate = myRequest2('POST', 'api/pc/account/raw', ['form_params' => $myBody]);
        $rebate = json_decode($rebate);
        if ($rebate->code == 200) {
            $viewinfo['rebate'] = $rebate->data;
        }
        // print_r($viewinfo['rebate']);exit;
        return view('rebate', $viewinfo);
    }

    /**
     * 添加返利
     */
    public function add()
    {
        $uid = $request->session()->get('user.uid', 0);
        // print_r(Input::all());exit;
        $rules = [
            'target_name' => 'required',
            'money' => 'required',
            'invest_time' => 'required',
            'platform' => 'required',
            'verifyCode' => 'required|verify_code',
            'platId' => 'required'
        ];

        $messages = [
            'mobile.required' => '请输入您的手机号',
            'verifyCode.required' => '手机验证码不能为空',
            'password.required' => '密码未传'
        ];
        $validator = Validator::make(Input::all(), $rules, $messages);
        if($validator->fails()) {
            return response()->json([
                'errorno' => 0,
                'rtndata' => $validator->errors()
            ]);
        }

        $targetName = Input::post('target_name', '');
        $money = Input::post('money', 0);
        $investTime = Input::post('invest_time', '');
        $platform = Input::post('platform', '');
        $verifyCode = Input::post('verifyCode');
        $platId = Input::post('platId');

        $myBody = [
            'uid' => $uid,
            'plat' => $platId,
            'targetName' => $targetName,
            'amount' => $amount,
            'investTime' => $investTime
        ];

        $rebate = myRequest2('POST', 'rebate/rebateList ', ['json' => $myBody]);
        $rebate = json_decode($rebate);
        // print_r($rebate);exit;
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
