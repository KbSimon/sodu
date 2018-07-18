<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Validator;
use Request;
use SmsManager;
use Config;

class SmsController extends Controller
{
    protected $_smscodeList = [
        0 => 'SMS_134320998', //注册
        1 => 'SMS_133963080', //登录
        2 => 'SMS_133963080', //忘记密码
        3 => 'SMS_133963080', //修改密码
    ];

    protected $_live_smscodeList = [
        0 => 'SMS_136350105', //注册
        1 => 'SMS_136350107', //登录
        2 => 'SMS_136391919', //忘记密码
        3 => 'SMS_136350103', //修改密码
    ];

    public function send(Request $request)
    {
        $rules = [
            'mobile' => 'required|max:18|regex:/^1[34578][0-9]{9}$/',
        ];
        $messages = [
            'mobile.required' => '请输入您的手机号',
            'mobile.max' => '最多18个数字',
            'mobile.regex' => '非手机号'
        ];
        $validator = Validator::make(Input::all(), $rules, $messages);
        
        if($validator->fails()) {
            return response()->json([
                'errorno' => -1,
                'rtndata' => $validator->errors()
            ]);
        }
        
        $mobile = Input::post('mobile');
        $type = Input::post('type', 0);
        if (Config::get('app.env') == 'live') {
            $code = $this->_live_smscodeList[$type];
        } else {
            $code = $this->_smscodeList[$type];
        }
        
        //验证是否可以请求
        $result = SmsManager::validateSendable();
        if($result['success'] != true) {
            return response()->json([
                'errorno' => -1,
                'rtndata' => $result['message']
            ]);
            // return response()->json($result);
        }
        //发送短信
        $options=[
            'Aliyun'=>$code,
        ];
        SmsManager::options($options);
        $result = SmsManager::requestVerifySms();
        if($result['success'] != true) {
            return response()->json([
                'errorno' => -1,
                'rtndata' => $result['message']
            ]);
            // return response()->json($result);
        }
        return response()->json($result);
    }

    // public function send(Request $request)
    // {
    //     $rules = [
    //         'mobile' => 'required|max:18|regex:/^1[34578][0-9]{9}$/',
    //     ];
    //     $messages = [
    //         'mobile.required' => '请输入您的手机号',
    //         'mobile.max' => '最多18个数字',
    //         'mobile.regex' => '非手机号'
    //     ];
    //     $validator = Validator::make(Input::all(), $rules, $messages);
        
    //     if($validator->fails()) {
    //         return response()->json([
    //             'errorno' => -1,
    //             'rtndata' => $validator->errors()
    //         ]);
    //     }

    //     $mobile = Input::post('mobile');
    //     $type = Input::post('type', 0);
    //     $myBody['mobile'] = $mobile;
    //     $myBody['type'] = $type;
        
    //     $res = myRequest('POST', 'sms/send', ['form_params' => $myBody]);
    //     $res = json_decode($res);
    //     if(!$res->success) {
    //         return response()->json([
    //             'errorno' => 1001,
    //             'rtndata' => $res->message
    //         ]);
    //     }
    //     return response()->json([
    //             'errorno' => 0,
    //             'rtndata' => $res->message
    //         ]); 
    // }

}
