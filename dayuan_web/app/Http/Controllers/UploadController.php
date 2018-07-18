<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
Use Config;

class UploadController extends Controller
{
    public function index()
    {
        return view('upload');
    }

    /**
     *  上传新闻
     */
    public function doupload(Request $request)
    {
        // print_r(Input::all());exit;
        $wenjian= $request->file('file');
        if ($wenjian->isValid()) {

            //获取文件的原文件名 包括扩展名
            $yuanname= $wenjian->getClientOriginalName();

            //获取文件的扩展名
            $kuoname=$wenjian->getClientOriginalExtension();

            //获取文件的类型
            $type=$wenjian->getClientMimeType();

            //获取文件的绝对路径，但是获取到的在本地不能打开
            $path=$wenjian->getRealPath();

            //要保存的文件名 时间+扩展名
            $filename=date('Y-m-d-H-i-s') . '_' . uniqid() .'.'.$kuoname;
            //保存文件          配置文件存放文件的名字  ，文件名，路径
            // print_r($path);exit;
            // print_r(file_get_contents($path));exit;
            #$imageurl = 'http://wddy-test.oss-cn-hangzhou.aliyuncs.com/uploads/'.date('Y-m-d').'/'.$filename;
            #$bool= Storage::disk('oss')->put($imageurl,file_get_contents($path));
            $ossurl = Config::get('myconfig.oss_url');
           //print_r($ossurl);exit;
            $imageName = 'uploads/'.date('Y-m-d').'/'.$filename;
            $bool= Storage::disk('oss')->put($imageName,file_get_contents($path));
           //$imageurl = 'http://wddy-test.oss-cn-hangzhou.aliyuncs.com/uploads/'.date('Y-m-d').'/'.$filename;
            //$bool= Storage::disk('oss')->put($imageurl,file_get_contents($path));
            // echo $bool;exit;
            // return back();
        }
        
        $viewinfo = [];
        $myBody = [
            'title' => Input::post('title'),
            'author' => Input::post('author'),
            'ntype' => Input::post('ntype'),
            'content' => Input::post('content'),
            'keys' => Input::post('keys'),
            'image' => $ossurl.$imageName
        ];
        $news = myRequest('POST', 'news/add', ['form_params' => $myBody]);
        // print_r($news);exit;
        $news = json_decode($news);
        if (!$news->errorno) {
            $viewinfo['news'] = $news->rtndata;
        }
        print_r($news);exit;
    }
}
