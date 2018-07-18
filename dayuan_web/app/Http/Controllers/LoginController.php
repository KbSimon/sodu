<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Support\Facades\Input;

use GuzzleHttp\Client;
use Session;
use Request;
// use Agent;

class LoginController extends Controller
{
    public function login()
    {
        // //如果是wap端
        // $agent = new Agent();

        // if(Agent::isMobile()) {
        //     return view('mobile/login');
        // }
        return view('login');
    }

    public function dologin()
    {
        //判断是手机登录还是密码登陆
        $rules = [
            'mobile' => 'required|max:18'
        ];
        $logintype = Input::post('type', 0);
        $mobile = Input::post('mobile');
        $myBody['phone'] = $mobile;
        switch ($logintype) {
            case 0:
                $rules['password'] = 'required';
                $password = Input::post('password');
                $myBody['password'] = $password;
                break;
            case 1:
                $rules['verifyCode'] = 'required';
                $verifyCode = Input::post('verifyCode');
                $myBody['verifyCode'] = $verifyCode;
                break;
            default:
                $rules['password'] = 'required';
                $password = Input::post('password');
                $myBody['password'] = $password;
                break;
        }
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
        
        $res = myRequest2('POST', 'user/login', ['json' => $myBody]);
        $res = json_decode($res);
        if ($res->code != 200) {
            return response()->json([
                'errorno' => $res->code,
                'rtndata' => $res->msg
            ]);
        }
        $userinfo = $res->data->user;

        $SessionInfo    = [
            'uid'       => $userinfo->id,
            'mobile'    =>  substr_replace($userinfo->phone,'****',3,4),
            'islogin' => 1,
            'userGrade' => $userinfo->userGrade
        ];
        Session::put('user', $SessionInfo);

        return response()->json([
                'errorno' => 0,
                'rtndata' => 'login success'
            ]);      
    }

    public function logout()
    {
        Session::forget('user');
        return Redirect('/');
    }

    public function forget()
    {
        return view('forget');
    }

    public function passReset()
    {
        $phone = Input::post('mobile');
        $myBody['phone'] = $phone;
        $password = Input::post('password');
        $myBody['password'] = $password;
        $res = myRequest2('POST', 'user/pwdReset', ['json' => $myBody]);
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
                'rtndata' => $res->msg
            ]);
    }

    /**
     * 手机端登录
     */
    public function aaamLogin()
    {
        //判断是手机登录还是密码登陆
        $rules = [
            'mobile' => 'required|max:18'
        ];
        $logintype = Input::post('type', 0);
        $mobile = Input::post('mobile');
        $myBody['phone'] = $mobile;
        switch ($logintype) {
            case 0:
                $rules['password'] = 'required';
                $password = Input::post('password');
                $myBody['password'] = $password;
                break;
            case 1:
                $rules['verifyCode'] = 'required';
                $verifyCode = Input::post('verifyCode');
                $myBody['verifyCode'] = $verifyCode;
                break;
            default:
                $rules['password'] = 'required';
                $password = Input::post('password');
                $myBody['password'] = $password;
                break;
        }
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
            return response()->jsonp($request->input('callback'), [ 'code' => -1, 'msg' => '失败', 'data' => [] ], 200, [], JSON_UNESCAPED_SLASHES);
        }
        
        $res = myRequest2('POST', 'user/login', ['json' => $myBody]);
        $res = json_decode($res);
        if ($res->code != 200) {
            return response()->jsonp($request->input('callback'), [ 'code' => $res->code, 'msg' => $res->msg, 'data' => [] ], 200, [], JSON_UNESCAPED_SLASHES);
        }
        $userinfo = $res->data->user;

        $SessionInfo    = [
            'uid'       => $userinfo->id,
            'mobile'    => $userinfo->phone,
            'islogin' => 1,
            'userGrade' => $userinfo->userGrade
        ];
        Session::put('user', $SessionInfo);

        return response()->jsonp($request->input('callback'), [ 'code' => 200, 'msg' => '成功', 'data' => [] ], 200, [], JSON_UNESCAPED_SLASHES);
    }

    /**
     * 登录
     */
    public function mLogin(Request $request)
    {
        $phone = Input::get('phone', ''); 
        $password = Input::get('password', ''); 
        $type = Input::get('type');
        $code = Input::get('code');
        if($type == 1) {
            $myBody['phone'] = $phone;
            $myBody['password'] = $password;
            $myBody['type'] = 1;
        } elseif($type == 2) {
            $myBody['phone'] = $phone;
            $myBody['code'] = $code;
            $myBody['type'] = 2;
        }
        
        $res = myRequest2('POST', 'api/h5/login', ['form_params' => $myBody]);
        $res = json_decode($res);
        if ($res->code != 200) {
            return response()->jsonp(Input::get('callback'), [ 'code' => $res->code, 'msg' => $res->msg], 200, [], JSON_UNESCAPED_SLASHES);
        }
        // print_r($res);exit;
        $userinfo = $res->data;

        $SessionInfo    = [
            'uid'       => $userinfo->userId,
            'mobile'    =>  substr_replace($userinfo->phone,'****',3,4),
            'islogin' => 1,
            'userGrade' => 1
        ];
        Session::put('user', $SessionInfo);

        return response()->jsonp(Input::get('callback'), [ 'code' => $res->code, 'msg' => $res->msg ], 200, [], JSON_UNESCAPED_SLASHES);
    }

}
