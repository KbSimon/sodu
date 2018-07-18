<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function list(request $request)
    {
        //独家新闻
        $viewinfo = [];
        $page = $request->input('page', 1);
        $pageSize = 5;
        $myBody = ['type' => 2, 'limit' => $pageSize, 'page' => $page];
        //产品信息
        $onlyNews = myRequest('POST', 'news', ['form_params' => $myBody]);
        $onlyNews = json_decode($onlyNews);
        if (!$onlyNews->errorno) {
            $viewinfo['onlyNews'] = $onlyNews->rtndata;
        }
        
        //行业新闻
        $myBody = ['type' => 3, 'limit' => 2];
        $industry = myRequest('POST', 'news/some', ['form_params' => $myBody]);
        $industry = json_decode($industry);
        if (!$industry->errorno) {
            $viewinfo['industry'] = $industry->rtndata;
        }
        //热门资讯 
        $myBody = ['type' => 1, 'limit' => 8];
        $hotlist = myRequest('POST', 'news/some', ['form_params' => $myBody]);
        $hotlist = json_decode($hotlist);
        if (!$hotlist->errorno) {
            $viewinfo['hotlist'] = $hotlist->rtndata;
        }
        return view('messages', $viewinfo);
    }

    public function show($nid)
    {
        //新闻详情
        $viewinfo = [];
        $myBody = ['nid' => $nid];
        $news = myRequest('POST', 'news/getone', ['form_params' => $myBody]);
        $news = json_decode($news);
        if (!$news->errorno) {
            //处理下html
            $viewinfo['news'] = $news->rtndata;
        }
        // print_r($viewinfo['news']);exit;
        //行业新闻
        $myBody = ['type' => 3, 'limit' => 2];
        $industry = myRequest('POST', 'news/some', ['form_params' => $myBody]);
        $industry = json_decode($industry);
        if (!$industry->errorno) {
            $viewinfo['industry'] = $industry->rtndata;
        }
        //热门资讯 
        $myBody = ['type' => 1, 'limit' => 8];
        $hotlist = myRequest('POST', 'news/some', ['form_params' => $myBody]);
        $hotlist = json_decode($hotlist);
        if (!$hotlist->errorno) {
            $viewinfo['hotlist'] = $hotlist->rtndata;
        }

        return view('messagesDetails', $viewinfo);
    }
}
