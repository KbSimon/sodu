<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BankController extends Controller
{

    /**
     * 添加银行卡认证
     */
    public function add(Request $request)
    {   
        //查看用户的收益
        $money = $request->get('money');
        $uid = $request->get('uid', 1);
        $myBody = ['uid' => 1,'money' => $money];
        $addBankInfo = myRequest('POST', 'account', ['form_params' => $myBody]);
        return $addBankInfo;
    }
}
