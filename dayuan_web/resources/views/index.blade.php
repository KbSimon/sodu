@extends('layouts.app') 
@section('title', '网贷大院-基于大数据风控 P2P 理财综合门户')
@section('keywords','网贷，P2P网贷，P2P理财，网贷大院，理财')
@section('description', '网贷大院是浙江省大数据科技协会旗下P2P理财综合门户，应用大数据分析手段建立权威的评级体系，秉承 “风险分散化、收益最大化”的理念，让投资小白迅速成长为投资专家，实现“人人慧投资”的伟大梦想。') 
@section('content')
<link rel="stylesheet" href="{{ URL::asset(Config::get('myconfig.oss_url')) }}css/index.css">
<link rel="stylesheet" href="{{ URL::asset(Config::get('myconfig.oss_url')) }}plugins/swiper/swiper.min.css">
<!-- top -->
<div class="top">
    <!-- banner -->
    <div class="swiper-container swiper-container-horizontal">
        <div class="swiper-wrapper">
        <div class="swiper-slide">
            @if ( Session::get('user.islogin', 0) !== 1)
                <a href="/login" class="banner01"></a>
            @elseif ( Session::get('user.islogin', 0) == 1)
                <a href="/account/money" class="banner01"></a>
            @else
            @endif
            </div>
            <div class="swiper-slide">
                <a href="" class="banner02"></a>
            </div>
            <div class="swiper-slide">
                <a href="" class="banner03"></a>
            </div>
            <div class="swiper-slide">
                <a href="" class="banner04"></a>
            </div>
            <!-- <div class="swiper-slide">
                <a href="" class="banner05"></a>
            </div> -->
        </div>
       <!-- Add Pagination -->
        <div class="swiper-pagination" id="pagination"></div>
    </div>
</div>
<!-- 公告 -->
<div class="announcement">
    <div class="noticeBoard">
        <div class="announcement_top clearfloat">
            <div class="announcement_left clearfloat">
                <i class="announcement_icon"></i>
                <p>公告&#x3000;|</p>
            </div>
            <div class="announcement_middle">
                <ul class="announcement_list clearfloat">
                    <li>
                        <div class="announcement_title">喜讯：祝贺团贷网入驻网贷大院</div>
                        <div class="announcement_date"></div>
                    </li>
                    <!-- <li>
                        <div class="announcement_title">喜讯：祝贺百金贷入驻网贷大院</div>
                        <div class="announcement_date"></div>
                    </li>
                    <li>
                        <div class="announcement_title">喜讯：祝贺网贷大院发布会成功举办</div>
                        <div class="announcement_date"></div>
                    </li>
                    <li>
                        <div class="announcement_title">喜讯：祝贺自律倡议活动成功举办</div>
                        <div class="announcement_date"></div>
                    </li> -->
                </ul>
            </div>
            
        </div>
        <ul class="announcement_content clearfloat">
            <li>
                <div class="rebate_icon"></div>
                <div>
                    <p class="rebate_title">风险量化</p>
                    <p>权威的风控体系
                        <br>助力政府有效监督</p>
                </div>
            </li>
            <li>
                <div class="safety_icon"></div>
                <p class="rebate_title">专业可靠</p>
                <p>专业的律师团队
                    <br>助力合规平台做强做大</p>
            </li>
            <li>
                <div class="hotInformation_icon "></div>
                <p class="rebate_title">分散投资</p>
                <p>个性化投资推荐
                    <br>引导投资人分散投资</p>
            </li>
        </ul>
    </div>

</div>
<!-- 理财资讯 -->
<div class="messages">
    <div class="produce_top clearfloat">
        <div class="produce_title">
            <p>大院资讯</p>
            <img src="{{ URL::asset(Config::get('myconfig.oss_url')) }}images/common/border.png" class="unborder">
        </div>
    </div>
    <div class="policy clearfloat">
        <div class="policy_left"></div>
        <div class="policy_right">
            <div class="policy_top clearfloat">
                <p class="policy_title" onclick="window.location.href='news/{{$policyNews[0]->id}}'">{{$policyNews[0]->title}}</p>
                <p class="policy_date">{{\Carbon\Carbon::parse($policyNews[0]->updated_at)->format('m/d')}}</p>
            </div>
            <div class="policy_content" onclick="window.location.href='/news/{{$policyNews[0]->id}}'">{{$policyNews[0]->part}}</div>
        </div>
    </div>
    <div class="messages_bottom">
        <ul class="newsUp clearfloat">
            <li class="newsActive">热点资讯</li>
            <li>行业新闻</li>
            <li>独家新闻</li>
            <div class="newsMore">
            <a href="/news">更多</a>
            <img src="images/index/more.png">
        </div>
        </ul>
        <div class="newsBottom">
            <div class="hotspot">
                <ul class="hotspot_ul clearfloat">
                @foreach ($hotNews as $hotNews)
                    <li>
                        <a href="/news/{{$hotNews->id}}">
                            <div class="newsText">{{$hotNews->title}}</div>
                            <div class="newsDate">{{\Carbon\Carbon::parse($hotNews->updated_at)->format('m/d')}}</div>
                        </a>
                    </li>
                  @endforeach
                </ul>
                <div class="advertising01"></div>
                <!-- <div class="advertising02"></div> -->
            </div>
            <div class="only">
            <ul class="only_ul clearfloat">
            @foreach ($onlyNews as $onlyNews)
                    <li>
                        <a href="/news/{{$onlyNews->id}}">
                            <div class="newsText">{{$onlyNews->title}}</div>
                            <div class="newsDate">{{\Carbon\Carbon::parse($onlyNews->updated_at)->format('m/d')}}</div>
                        </a>
                    </li>
                  @endforeach
                </ul>
                <div class="advertising01"></div>
                <!-- <div class="advertising02"></div> -->
            </div>
            <div class="business">
            <ul class="business_ul clearfloat">
            @foreach ($industryNews as $industryNews)
                    <li>
                        <a href="/news/{{$industryNews->id}}">
                            <div class="newsText">{{$industryNews->title}}</div>
                            <div class="newsDate">{{\Carbon\Carbon::parse($industryNews->updated_at)->format('m/d')}}</div>
                        </a>
                    </li>
                  @endforeach
                </ul>
                <div class="advertising01"></div>
                <!-- <div class="advertising02"></div> -->
            </div>
        </div>
    </div>
</div>

<!-- 优选产品 -->
<div class="produce">
    <div class="produce_top clearfloat">
        <div class="produce_title">
            <p>大院返利</p>
            <img src="{{ URL::asset(Config::get('myconfig.oss_url')) }}images/common/border.png" class="unborder">
        </div>
        <div class="to_more">
            <a href="/product">更多</a>
            <img src="images/index/more.png">
        </div>
    </div>

    <div class="produce_content clearfloat">
        <div class="produce_left">
            <div class="produce_bg">
                <a href="/product"></a>
            </div>
        </div>
        <div class="produce_right">
            @foreach($res5Selected->products as $good)
            <ul class="produce_ul clearfloat">
                <li class="logo_li">
                    <img src="{{$good->logoUrl}}">
                </li>
                <li class="rebate_li">
                    <p>{{$good->wddyMinRate}}
                        <span>%</span>-
                        {{$good->wddyMaxRate}}
                        <span>%</span>
                    </p>
                    <p>综合年化</p>
                </li>
                <li class="rebate_li">
                <p>{{$good->initMinRate}}
                        <span>%</span>-
                        {{$good->initMaxRate}}
                        <span>%</span>
                    </p>
                <p>平台年化</p>
                </li>
                <li class="date_li">
                    <p>{{$good->minLendMoney}}元起投</p>
                    <p>{{$good->minDueTime}}-{{$good->maxDueTime}}
                        @if($good->dueUnit == 1 )
                        天
                        @elseif($good->dueUnit == 2)
                        月
                        @elseif($good->dueUnit == 3)
                        年
                        @else
                        @endif
                    </p>

                </li>
                <li class="btn_li">
                @if(( Session::get('user.islogin', 0) !== 1))
                    <a href="/login">立即查看</a>
                @elseif($good->interestType ==1)
                    <a href="/product/{{$good->productId}}">立即查看</a>
                @elseif($good->interestType ==2)
                    <a href="{{$good->thirdUrl}}" target="_blank">立即查看</a>
                @else
                @endif
            </ul>
            @endforeach
            
        </div>
    </div>
</div>
<div class="statement clearfloat">
    <a class="strategy" href="/newbice"></a>
    <div class="impunity clearfloat">
        <div class="impunity_left"></div>
        <div class="impunity_right">
            <p class="impunity_title">免责声明</p>
            <p class="impunity_text">网贷大院仅为信息平台，您不会在大院有任何充值及投资行为。大院返利页面中的活动均来自平台方，仅作活动展示，不代表安全性，不构成投资建议。网贷有风险，请您谨慎选择参与活动，网贷大院将不承担相关责任。</p>
        </div>
    </div>
</div> 
<!-- 合作伙伴 -->
<div class="friends">
    <div class="friends_title">
        <p>合作伙伴</p>
        <img src="{{ URL::asset(Config::get('myconfig.oss_url')) }}images/common/border.png" class="unborder">
    </div>
    <ul class="friends_ul clearfloat">
        <li class="friends_icon2">
            <a href="javascript:;">
                <img src="{{ URL::asset(Config::get('myconfig.oss_url')) }}images/index/icon_02.png">
            </a>
        </li>
        <li class="friends_icon3">
            <a href="javascript:;">
                <img src="{{ URL::asset(Config::get('myconfig.oss_url')) }}images/index/icon_03.png">
            </a>
        </li>
        <li class="friends_icon4">
            <a href="javascript:;">
                <img src="{{ URL::asset(Config::get('myconfig.oss_url')) }}images/index/icon_04.png">
            </a>
        </li>
        <li class="friends_icon5">
            <a href="javascript:;">
                <img src="{{ URL::asset(Config::get('myconfig.oss_url')) }}images/index/icon_05.png">
            </a>
        </li>
        <li class="friends_icon7">
            <a href="javascript:;">
                <img src="{{ URL::asset(Config::get('myconfig.oss_url')) }}images/index/icon_07.png">
            </a>
        </li>
        <li class="friends_icon8">
            <a href="javascript:;">
                <img src="{{ URL::asset(Config::get('myconfig.oss_url')) }}images/index/icon_08.png">
            </a>
        </li>
        <li class="friends_icon9">
            <a href="javascript:;">
                <img src="{{ URL::asset(Config::get('myconfig.oss_url')) }}images/index/icon_09.png">
            </a>
        </li>
        <li class="friends_icon10">
            <a href="javascript:;">
                <img src="{{ URL::asset(Config::get('myconfig.oss_url')) }}images/index/icon_10.png">
            </a>
        </li>
    </ul>
</div>
<script src="{{ URL::asset(Config::get('myconfig.oss_url')) }}js/jquery.min.js"></script>
<script src="{{ URL::asset(Config::get('myconfig.oss_url')) }}plugins/swiper/swiper.min.js"></script>
<script>
    $(".to_top").click(function () {
        $(window).scrollTop(0);
    })

    // banner
    var swiper1 = new Swiper('.swiper-container', {
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        // pagination: '#top_middle'
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
    swiper1.el.onmouseover = function () {
        swiper1.autoplay.stop();
    }
    swiper1.el.onmouseout = function () {
        swiper1.autoplay.start();
    }


    // 公告
    var news = 0;

    function nextGG() {
        news = news == $('.announcement_list li').length - 3 ? 0 : news + 1;
        carouselGG();
    }

    function prevGG() {
        news = news == 0 ? $('.announcement_list li').length - 3 : news - 1;
        carouselGG();
    }

    function carouselGG() {
        var poTop1 = -(($('.announcement_list li').outerHeight(true)) * news);
        $('.announcement_list').stop().animate({
            top: poTop1
        }, 300);
    }
    var next = setInterval(nextGG, 5000);

    // 优选产品
    $(".newsUp>li").click(function(){
        $(this).addClass("newsActive").siblings().removeClass("newsActive");
        $(".newsBottom>div").eq($(this).index()).show().siblings().hide();
    })

    $(".to_login").click(function () {
        $("input").focus(function () {
            $(this).siblings("p").text("");
        });
        // 判断用户名是否为空
        if ($(".user_inp").val() === "") {
            $(".error_01").text("手机号不能为空！");
            return false;
        }
        // 判断手机格式
        else if (!/^(13|15|18|14|17)[0-9]{9}$/.test($(".user_inp").val()) || $(".user_inp").val().length < 11) {
            $(".error_01").text("手机号码格式不正确！");
            return false;
        }
        // 判断密码是否为空
        else if ($(".pwd_inp").val() === "" || $(".pwd_inp").val().length < 6) {
            $(".error_02").text("请输入至少6位数密码！");
            return false;
        }
        $.ajax({
            type: "post",
            url: "/login",
            dataType: "json",
            data: {
                mobile: $(".user_inp").val(),
                _token: '{{ csrf_token() }}',
                password: $(".pwd_inp").val(),
            },
            success: function (data) {
                if(data.errorno === 0){
                    window.location.href = "/";
                }else{
                    $('.error_02').text(data.rtndata); // 处理登录失败错误信息
                }
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {}
        });
    });
</script>
@endsection