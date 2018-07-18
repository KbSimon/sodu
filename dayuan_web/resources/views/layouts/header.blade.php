<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8">
    <meta http-equlv="expires" content="0">
    <meta http-equlv="Pragma" content="no-cache">
    <meta http-equlv="X-UA-Compatible" content="IE=edge">
    <meta name="baidu-site-verification" content="AGVr9iYXSa" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="description" content="@yield('description')">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ URL::asset(Config::get('myconfig.oss_url')) }}/css/base.css">
    <link rel="stylesheet" href="{{ URL::asset(Config::get('myconfig.oss_url')) }}/css/common.css">
    <link rel="shortcut icon" type="image/x-icon" href="{{ URL::asset(Config::get('myconfig.oss_url')) }}images/common/favicon.ico">
</head>

<body>
    <div class="header">
        <div class="headUp">
            <div class="headUp_content clearfloat">
                <div class="headUp_left">网贷大院欢迎您~</div>
                <div class="headUp_right">
                   <ul class="app_down clearfloat">
                       <li class="down_icon"></li>
                       <li>APP下载</li>
                       <div class="app_QR"></div>
                   </ul>
                </div>
            </div>
        </div>
        <div class="headBottom">
        <div class="headerTop clearfloat">
            <div class="headerTop_left">
                <a href="/"></a>
            </div>
            <ul class="headerTop_right clearfloat">
                <li>
                    <a href="/" class="border01">首页</a>
                </li>
                <li>
                    <a href="/product">大院返利</a>
                    <img src="{{ URL::asset(Config::get('myconfig.oss_url')) }}images/common/packet.png" class="packet">
                </li>
                <li>
                    <a href="/news">大院资讯</a>
                </li>
                <li>
                    <a href="/newbice">新手指引</a>
                </li>
                <li>
                    <a href="/about">关于大院</a>
                </li>
            </ul>
           
            <div class="customer">
                @if ( Session::get('user.islogin', 0) !== 1)
                <div class="customer_state clearfloat">
                    <img src="{{ URL::asset(Config::get('myconfig.oss_url')) }}images/common/user.png">
                    <ul class="head_login clearfloat">
                        <li> 
                            <a href="/login">请登录</a>
                        </li>
                        <li>
                            <a href="/register">免费注册</a>
                        </li>
                    </ul>
                </div>
                @elseif ( Session::get('user.islogin', 0) == 1)
                <div class="customer_state clearfloat">
                    <img src="{{ URL::asset(Config::get('myconfig.oss_url')) }}images/common/user.png">
                    <a href="/account">个人中心</a>
                </div>
                <ul class="customer_ul">
                    <li>
                        <a href="/account">
                            <div class="customer_icon01"></div>
                            <div>账号总览</div>
                        </a>
                    </li>
                    <li>
                        <a href="/account/rebate">
                            <div class="customer_icon02"></div>
                            <div>返利记录</div>
                        </a>
                    </li>
                    <li>
                        <a href="/account/money">
                            <div class="customer_icon03"></div>
                            <div>邀请好友</div>
                        </a>
                    </li>
                    <li>
                        <a href="/account/info">
                            <div class="customer_icon04"></div>
                            <div>账号设置</div>
                        </a>
                    </li>
                    <li>
                        <a href="/logout">
                            <div class="customer_icon05"></div>
                            <div>退出登录</div>
                        </a>
                    </li>
                </ul>
            </div>
            @else
            @endif
        </div>
        </div>      
    </div>
    <ul class="right_bar clearfloat">
        <li class="return_top"></li>
        <li class="service">
           <a href="https://qiyukf.com/client?k=359e14572b24ad73b93d1358ff2aca6c&u=&d=ho6ri7wpubkpdu3cbtqr&uuid=nhjktb8i4edsigjmhw5i&gid=0&sid=0&qtype=0&dvctimer=0&robotShuntSwitch=0&hc=0&robotId=0&t=%25E7%25BD%2591%25E8%25B4%25B7%25E5%25A4%25A7%25E9%2599%25A2-%25E5%259F%25BA%25E4%25BA%258E%25E5%25A4%25A7%25E6%2595%25B0%25E6%258D%25AE%25E9%25A3%258E%25E6%258E%25A7%2520P2P%2520%25E7%2590%2586%25E8%25B4%25A2%25E7%25BB%25BC%25E5%2590%2588%25E9%2597%25A8%25E6%2588%25B7" target="_blank"></a>
        </li>
        <li class="nationwide">
            <div class="nationwide_phone">
                <i class="nationwide_icon"></i>
                <p>400-005-8669</p>
            </div>
        </li>
        <li class="down_app">
            <div class="down"></div>
        </li>
    </ul>
</body>
    <script src="https://qiyukf.com/script/359e14572b24ad73b93d1358ff2aca6c.js"></script>
    <script src="{{ URL::asset(Config::get('myconfig.oss_url')) }}js/jquery.min.js"></script>
    <script>


        $(".return_top").click(function(){
            $(window).scrollTop(0);
        })

        var url = window.location.href;  
        $(".headerTop_right li a").each(function () {  
            if (returnUrl($(this).attr("href")) == returnUrl(url)) {   
            $(this).addClass("border01").parent("li").siblings("li").children("a").removeClass("border01");;
            }  
        });  
        function returnUrl(href) {  
            var number = href.lastIndexOf("/");  
            return href.substring(number + 1);  
        }  
    </script>