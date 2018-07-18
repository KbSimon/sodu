<?php
/**
 * 帐户总览
 */
namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class InviteController extends Controller
{
    public function show(Request $request)
    {
        //查看用户的收益
        $uid = $request->session()->get('user.uid', 0);
        $page = Input::get('page', 1);
        $pageSize = Input::get('pageSize', 3);
        $myBody = [
            'userId' => $uid,
            'page' => $page,
            'pageSize' => $pageSize
        ];
        $news = myRequest2('POST', '/api/pc/invite', ['form_params' => $myBody]);
        $news = json_decode($news);
        if ($news->code == 200) {
            $viewinfo['accountinfo'] = $news->data;
        }
        print_r($viewinfo['accountinfo']);exit;
        
        return view('money', $viewinfo);
    }

}
