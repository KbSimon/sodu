@extends('layouts.app')
@section('title', 'P2P网贷_关于我们_大院介绍_网贷大院') 
@section('description', '网贷大院是浙江省大数据科技协会旗下P2P理财综合门户，应用大数据分析手段建立权威的评级体系，整合网贷信息与互联网金融大数据的资讯服务和综合性网贷门户网站，帮助合规平台走得更快更稳，助力互联网金融行业健康发展。') 
@section('keywords','网贷，网贷大院，大院介绍，p2p理财')
@section('content')
<link rel="stylesheet" href="{{ URL::asset(Config::get('myconfig.oss_url')) }}css/aboutUs.css">
<div class="aboutUs">
    <div class="banner"></div>
    <div class="aboutUs_content">
        <div class="aboutUs_title clearfloat">
            <img src="{{ URL::asset(Config::get('myconfig.oss_url')) }}images/aboutUs/icon.png">
            <p>关于大院</p>
        </div>
        <div class="aboutUs_text">
        <p>网贷大院（www.wangdaidayuan.com）是国内首家行业协会——浙江省大数据科技协会旗下，整合网贷信息与互联网金融大数据的资讯服务和综合性网贷门户网站。</p>
        <p>大院崇尚严谨与科学、安全与合规的理念，在网贷行业专家和各大律所的强强联合下，应用大数据分析手段建立权威的评级体系，解读最新的行业政策，帮助合规平台走得更快更稳，助力互联网金融行业健康发展。</p>
        <p>同时，大院秉承 “风险分散化、收益最大化”的理念，引导投资人建立“鸡蛋不放一个篮子”的投资策略，首次提出“投资人成长计划”，让投资小白迅速成长为投资专家，实现“人人慧投资”的伟大梦想。</p>
        </div>
        <ul class="aboutUs_ul clearfloat">
        </ul>
    </div>
</div>
@endsection