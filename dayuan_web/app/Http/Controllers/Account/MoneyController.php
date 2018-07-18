<?php
/**
 * 返利控制器
 */
namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;

class MoneyController extends Controller
{
    public function list(Request $request)
    {
        //查看用户的收益
        $uid = $request->session()->get('user.uid', 0);
        $page = $request->input('page', 1);
        $pageSize = $request->input('pageSize', 3);
        $myBody = [
            'userId' => $uid,
            'page' => $page,
            'pageSize' => $pageSize
        ];
        // print_r($myBody);
        $invite = myRequest2('POST', '/api/pc/invite', ['form_params' => $myBody]);
        // print_r($news);exit;
        $invite = json_decode($invite);
        if ($invite->code == 200) {
            $viewinfo['invite'] = $invite->data;
        }
        // print_r($viewinfo['invite']);exit;
        
        return view('money', $viewinfo);
    }

}
