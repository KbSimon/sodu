<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class ProductController extends Controller
{

    public function index(Request $request)
    {
        $viewinfo = [];
        $page = $request->input('page', 1);
        $platBackground = $request->input('platBackground', '');
        // $platBackground = $request->input('');
        // $platBackground = $request->input('pid');
        $pageSize = 5;
        //产品推荐
        $myBody = [
            'pageSize' => $pageSize, 
            'pageNum' => $page
        ];
        if($platBackground) {
            $myBody['platBackground'] = $platBackground;
        }
        $productList = myRequest2('POST', 'product/productList', ['json' => $myBody]);
        $productList = json_decode($productList);
        // print_r($productList);exit;
        if(!$productList->code) {
            //没有产品的时候显示
        }
        $productList = $productList->data;
        $productList->pageSize = $pageSize;
        $productList->page = $page;
        $viewinfo['productList'] = $productList;
        
        return view('produceList', $viewinfo);
    }

    public function show(Request $request, $pid)
    {
        $viewinfo = [];

        $myBody = ['productId' => $pid];
        //产品信息
        $uid = Session::get('user.uid', 0);
        $curProduct = myRequest2('GET', 'product/productDetail?uid='.$uid.'&productId='.$pid);
        $curProduct = json_decode($curProduct);
        if($curProduct->code == 200) {
            $viewinfo['product'] = $curProduct->data;
        }
        
        //返利平台列表
        $platformlist = myRequest2('GET', 'plat/platDetailIdAndName');
        $platformlist = json_decode($platformlist);
        if ($platformlist->code == 200) {
            $viewinfo['platformlist'] = $platformlist->data->platInfoList;
        }

        //用户是否绑卡
        $myBody = ['userId' => $uid];
        $bankinfo = myRequest2('POST', 'api/pc/user/bank', ['form_params' => $myBody]);
        $bankinfo = json_decode($bankinfo);
        // print_r($bankinfo);exit;
        if ($bankinfo->code == 200) {
            $viewinfo['bankinfo'] = $bankinfo->data->userBank;
        }

        // print_r($viewinfo);exit;
        return view('produceDetails', $viewinfo);
    }

    public function recomand(Request $request)
    {
        $uid = $request->input('uid', 0); 
        
        // if (!$uid || !is_numeric($uid)) {
        //     return response()->json([ 'code' => -1001, 'msg' => '参数不能为空！' ]);
        // }
        $newsArr = [];
        $curProduct = myRequest2('GET', '/product/recommendProductList?uid='.$uid);
        $curProduct = json_decode($curProduct);
        if($curProduct->code == 200) {
            $newsArr = $curProduct->data;
        }
        return response()->jsonp($request->input('callback'), [ 'code' => 200, 'msg' => '成功', 'data' => $newsArr ], 200, [], JSON_UNESCAPED_SLASHES);
    }

    /**
     * 手机新闻详情的内容
     */
    public function mobileNewsContent(Request $request)
    {
        $nid = $request->input('n_id', 0);
        if (!$nid || !is_numeric($nid)) {
            return response()->json($this->_error_for_mobile[0]);
        }
        $curNews = $this->models::where('id', $nid)->where('status', 1)->first();
        if (!$curNews) {
            return response()->json($this->_error_for_mobile[1]);
        }
        if($curNews->content) {
            $news_content = $curNews->content->toArray();
            $newsArr['content'] = $news_content['content'];
            $newsArr['updated_at'] = $news_content['updated_at'];
            $newsArr['n_id'] = $nid;
            $newsArr['title'] = $curNews->title;
        }
        return response()->jsonp($request->input('callback'), [ 'code' => 200, 'msg' => '成功', 'data' => $newsArr ], 200, [], JSON_UNESCAPED_SLASHES);
    }

    /**
     * 获取用户绑定的银行
     */
    public function getbank()
    {
        //产品信息
        $uid = Session::get('user.uid', 0);

        if (!$uid) {
          return response()->json([
                'errorno' => -1,
                'rtndata' => '未登录'
            ]);  
        }
        
        $myBody = ['userId' => $uid];
        $res = myRequest2('POST', 'api/pc/user/bank', ['form_params' => $myBody]);
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
