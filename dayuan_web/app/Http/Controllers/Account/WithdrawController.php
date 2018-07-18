<?php
/**
 * 用户提现类
 */
namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class WithdrawController extends Controller
{
    public function list()
    {
        //查看用户的收益
        $myBody = ['uid' => 1];
        $news = myRequest('POST', 'withdraw', ['form_params' => $myBody]);
        // print_r($news);exit;
        $news = json_decode($news);
        $viewinfo['news'] = $news;

        return view('money', $viewinfo);
    }

    /**
     * 添加取现申请
     */
    public function add()
    {
        $myBody = ['uid' => 1, 'money' => 100];
        $applyInfo = myRequest('POST', 'withdraw/add', ['form_params' => $myBody]);
        return $applyInfo;
    }
}
