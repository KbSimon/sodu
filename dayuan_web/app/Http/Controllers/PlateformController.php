<?php

namespace App\Http\Controllers;

class PlateformController extends Controller
{

    public function __contruct()
    {

    }

    /**
     * 平台列表页
     */
    public function list(Request $request)
    {
        $
        $myBody = ['api_token' => 'rdMN1fDuDn23xBzUKstofsWirigkVYzOKLTmr0luyEUeQ8idkt9vtQjdtLQI'];
        $plateformlist = myRequest('GET', 'plateform',['form_params' => $myBody]);
        $plateformlist = json_decode($plateformlist);

        return view('index');
    }

    /**
     * 单个列表
     */
    public function show()
    {
        $myBody = ['api_token' => 'rdMN1fDuDn23xBzUKstofsWirigkVYzOKLTmr0luyEUeQ8idkt9vtQjdtLQI'];
        $plateformlist = myRequest('GET', 'plateform',['form_params' => $myBody]);
        $plateformlist = json_decode($plateformlist);
    }
}
