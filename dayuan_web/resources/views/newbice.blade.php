@extends('layouts.app')
@section('title', 'P2P网贷指南_新手指引_理财常见问题_网贷大院') @section('keywords','网贷，网贷新手常见问题，P2P理财，网贷理财，网贷大院')
@section('description', '网贷大院是浙江省大数据科技协会旗下P2P理财综合门户，应用大数据分析手段建立权威的评级体系，网贷大院新手引导解读理财常见问题，为广大理财用户提供更多P2P网贷指南与更优质的综合理财服务。')
@section('content')
<link rel="stylesheet" href="{{ URL::asset(Config::get('myconfig.oss_url')) }}css/noob.css">
<link rel="stylesheet" href="{{ URL::asset(Config::get('myconfig.oss_url')) }}css/base.css">
<link rel="stylesheet" href="{{ URL::asset(Config::get('myconfig.oss_url')) }}plugins/swiper/swiper.min.css">

<div class="banner">
    <div class="banner_content">
    </div>
</div>
<div class="part_01">
    <div class="bring">
        <p>网贷大院能为投资人带来什么？</p>
        <div class="bring_bottom"></div>
        <ul class="bring_ul clearfloat">
            <li>
                <img src="{{ URL::asset(Config::get('myconfig.oss_url')) }}images/newbice/learn.png">
                <p>学习投资</p>
                <span>Learning investment</span>
            </li>
            <li>
                <ul class="what_ul">
                    <li>投资人成长计划</li>
                    <li>分散投资</li>
                    <li>热点资讯</li>
                </ul>
            </li>
            <li>
                <img src="{{ URL::asset(Config::get('myconfig.oss_url')) }}images/newbice/attention.png">
                <p>关注投资</p>
                <span>Pay attention to investment</span>
            </li>
            <li>
                <ul class="what_ul">
                    <li>政策解读</li>
                    <li>专属理财顾问</li>
                    <li>分享投资心得</li>
                </ul>
            </li>
            <li>
                <img src="{{ URL::asset(Config::get('myconfig.oss_url')) }}images/newbice/talk.png">
                <p>聊聊投资</p>
                <span>Talk about investment</span>
            </li>
        </ul>
    </div>
</div>
<div class="part_02">
    <div class="how"></div>
    <div class="how_ul clearfloat">
        <li>
            <img src="{{ URL::asset(Config::get('myconfig.oss_url')) }}images/newbice/1.png">
            <p>注册网贷大院</p>
        </li>
        <li></li>
        <li>
            <img src="{{ URL::asset(Config::get('myconfig.oss_url')) }}images/newbice/2.png">
            <p>进入大院返利</p>
        </li>
        <li></li>
        <li>
            <img src="{{ URL::asset(Config::get('myconfig.oss_url')) }}images/newbice/3.png">
            <p>直达注册</p>
        </li>
        <li></li>
        <li>
            <img src="{{ URL::asset(Config::get('myconfig.oss_url')) }}images/newbice/4.png">
            <p>申请返利</p>
        </li>
        <li></li>
        <li>
            <img src="{{ URL::asset(Config::get('myconfig.oss_url')) }}images/newbice/5.png">
            <p>返利到账</p>
        </li>
    </div>
    <div class="carousel">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide" data-hash="slide1">
                    <div>
                        <span>1</span>注册网贷大院</div>
                    <div>请使用常用手机号注册账户，凭注册手机号可找回密码，
                        <br>在网贷大院官网首页点击“立即注册”，填写信息完成注册</div>
                </div>
                <div class="swiper-slide" data-hash="slide2">
                    <div>
                        <span>2</span>进入大院返利</div>
                    <div>选择符合您投资偏好的产品或咨询您的专属投资顾问</div>
                </div>
                <div class="swiper-slide" data-hash="slide3">
                    <div>
                        <span>3</span>直达注册</div>
                    <div>登录网贷大院账户，选择投资的标并跳转注册投资
                        <br>选择你要投资的平台，进入项目详情页，点击“直达注册”跳转至平台，根据指引完成平台注册</div>
                </div>
                <div class="swiper-slide" data-hash="slide4">
                    <div>
                        <span>4</span>申请返利</div>
                    <div>完成投资后，点击“申请返利”，请在跳转页面填写返利账户信息。</div>
                </div>
                <div class="swiper-slide" data-hash="slide5">
                    <div>
                        <span>5</span>返利到账</div>
                    <div>请等待返利数据核销，一般3个工作日内到账</div>
                </div>
            </div>
            <!-- Add Arrows -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</div>
<div class="part_03">
    <div class="join">
        <p>分散投资，来提高抗风险能力“鸡蛋不放同一篮子”是投资理念中最基本的原则</p>
        <p>我们建议您合理控制每个平台的资金分配，降低投资风险。</p>
        @if ( Session::get('user.islogin', 0) !== 1)
        <a href="/register" class="joinUs">加入我们</a>
        @elseif ( Session::get('user.islogin', 0) == 1)
        <a href="/" class="joinUs">加入我们</a>
        @else 
        @endif
    </div>
</div>

<script src="{{ URL::asset(Config::get('myconfig.oss_url')) }}js/jquery.min.js"></script>
<script src="{{ URL::asset(Config::get('myconfig.oss_url')) }}plugins/swiper/swiper.min.js"></script>
<script>
    var swiper = new Swiper('.swiper-container', {
        spaceBetween: 30,
        hashNavigation: {
            watchState: true,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
</script>
@endsection