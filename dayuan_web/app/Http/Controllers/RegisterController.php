<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Support\Facades\Input;
use Session;
use SmsManager;

class RegisterController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function doRegister()
    {
        $rules = [
            'mobile' => 'required|max:18',
            'captcha1' => 'required|captcha',
            'verifyCode' => 'required|verify_code',
            'password' => 'required|between:6,12|regex:[[A-Za-z][A-Za-z1-9_-]+]',
        ];
        $messages = [
            'mobile.required' => '请输入您的手机号',
            'verifyCode.required' => '手机验证码不能为空',
            'verifyCode.verify_code' => '手机验证码错误',
            'password.required' => '密码不能为空',
            'password.regex' => '密码由数字和字母组成',
            'captcha1.required' => '请输入验证码',
            'captcha1.captcha' => '验证码错误，请重试',
        ];
        $validator = Validator::make(Input::all(), $rules, $messages);
        if($validator->fails()) {
            // SmsManager::forgetState();
            return response()->json([
                'errorno' => -1,
                'rtndata' => $validator->errors()
            ]);
        }
        $mobile = Input::post('mobile');
        // $verifyCode = Input::post('verifyCode');
        $password = Input::post('password');
        $inviteCode = Input::post('inviteCode');

        $myBody['phone'] = $mobile;
        $myBody['password'] = $password;
        // $myBody['pwdConf'] = $password;
        $myBody['inviteCode'] = $inviteCode;
        // print_r($myBody);exit;
        $res = myRequest2('POST', 'user/userRegiste', ['json' => $myBody]);
        $res = json_decode($res);
        // print_r($res);exit;
        if ($res->code != 200) {
            return response()->json([
                'errorno' => $res->code,
                'rtndata' => $res->msg,
            ]);
        }

        $myBody = [];
        $myBody['phone'] = $mobile;
        $myBody['password'] = $password;
        // print_r($myBody);exit;
        $res = myRequest2('POST', 'user/login', ['json' => $myBody]);
        $res = json_decode($res);
        if ($res->code != 200) {
            return response()->json([
                'errorno' => $res->code,
                'rtndata' => $res->msg,
            ]);
        }

        $userinfo = $res->data->user;
        $SessionInfo    = [
            'uid'       => $userinfo->id,
            'mobile'    => $userinfo->phone,
            'islogin' => 1,
        ];
        Session::put('user', $SessionInfo);

        return response()->json([
                'errorno' => 0,
                'rtndata' => 'register success'
            ]);
    }

    /**
     * 验证手机号
     */
    public function checkPhone()
    {
        $mobile = Input::get('mobile');
        $res = myRequest2('GET', "user/checkRePhone?phone=".$mobile);
        $res = json_decode($res);
        // print_r($res);exit;
        if ($res->code != 200) {
            return response()->json([
                'errorno' => $res->code,
                'rtndata' => $res->msg,
            ]);
        }
        return response()->json([
            'errorno' => 0,
            'rtndata' => $res->msg,
        ]);
    }
}
