@extends('layouts.app')
@section('title', '网贷返利_网贷理财返利_p2p 返利平台_网贷大院') 
@section('keywords','网贷返利，大院返利，P2P理财返利，网贷理财返利，网贷大院')
@section('description', '大院返利精选网贷行业的 p2p 网贷平台，通过严格审核，力争国内最安全、可靠的网贷返利平台。提供P2P返利，投资返利，理财返利，网贷返利，金融理财返利等业务，在基于网贷平台本身给用户的正常回报之上，给予更多返利，让用户的投资收益率最大化') 
@section('content')
<link rel="stylesheet" href="{{ URL::asset(Config::get('myconfig.oss_url')) }}css/produceList.css">
<link rel="stylesheet" href="{{ URL::asset(Config::get('myconfig.oss_url')) }}plugins/layui/css/layui.css">
<div class="list">
    <div class="list_top">
        <div class="list_top_title">
            <p>大院返利</p>
            <img src="{{ URL::asset(Config::get('myconfig.oss_url')) }}images/produceList/border.png">
        </div>
        <div class="list_top_content">
            <ul class="earnings_ul clearfloat">
                <span class="earnings">平台背景：</span>
                <li class="active" name="0">不限</li>
                <li name="1">国资系</li>
                <li name="2">上市系</li>
                <li name="3">集团系</li>
                <li name="4">风投系</li>
                <li name="5">民营系</li>
            </ul>
            <ul class="object_ul clearfloat">
                <span class="object">平台收益：</span>
                <li class="active">不限</li>
                <li>10%以下</li>
                <li>10%~15%</li>
                <li>15%~20%</li>
                <li>20%以上</li>
            </ul>
            <ul class="name_ul clearfloat">
                <span class="name">标的期限：</span>
                <li class="active">不限</li>
                <li>30天以下</li>
                <li>1-3个月</li>
                <li>3-6个月</li>
                <li>6-12个月</li>
                <li>12个月以上</li>
            </ul>
        </div>
    </div>
    <div class="list_content">
        <div class="list_content_top">
            <div class="list_title">正在进行中</div>
        </div>
        <div class="list_content_bottom">
            @foreach($productList->products as $products)
            <section class="list_item clearfloat">
            <div class="list_left">
                <div class="company_logo">
                    <img src="{{$products->logoUrl}}">
                </div>
                @isset($products->productTags)
                <div class="tags clearfloat">
                @foreach($products->productTags as $tags)
                    <div>{{$tags->tag}}</div>
                    @endforeach
                </div>
                @endisset
            </div>
            <div class="list_right">
                <ul class="list_ul clerafloat">
                    <li>
                        <p>综合年化</p>
                        <p>{{$products->wddyMinRate}}
                        <span>%</span>-
                        {{$products->wddyMaxRate}}
                        <span>%</span>
                        </p>
                    </li>
                    <li>
                        <p>平台年化</p>
                        <p>{{$products->productMinRate}}
                        <span>%</span>-
                        {{$products->productMaxRate}}
                        <span>%</span>
                    </p>
                    </li>
                    <li>
                        <p>最低投资金额</p>
                        <p>{{$products->minLendMoney}}元</p>
                    </li>
                    <li>
                        <p>标的期限</p>
                        <p>{{$products->minDueTime}}-{{$products->maxDueTime}}
                        @if($products->dueUnit == 1)
                        天
                        @elseif($products->dueUnit == 2)
                        月
                        @elseif($products->dueUnit == 3)
                        年
                        @else
                        @endif</p>
                    </li>
                    <li class="produce_btn">
                        @if(( Session::get('user.islogin', 0) !== 1))
                            <a href="/login">立即查看</a>
                        @elseif($products->interestType ==1)
                            <a href="/product/{{$products->id}}">立即查看</a>
                        @elseif($products->interestType ==2)
                            <a href="{{$products->thirdUrl}}" target="_blank">立即查看</a>
                        @else
                        @endif
                    </li>
                </ul>
            </div>
            </section>
            @endforeach
            <div id="laypages_01">
            </div>
        </div>
    </div>
</div>

<script src="{{ URL::asset(Config::get('myconfig.oss_url')) }}js/jquery.min.js"></script>
<script src="{{ URL::asset(Config::get('myconfig.oss_url')) }}plugins/layui/layui.js"></script>
<script>
    layui.use(['laypage', 'layer'], function () {
        var laypage = layui.laypage,
            layer = layui.layer;
        laypage.render({
            elem: 'laypages_01',
            count: {{$productList->total}},
            limit: {{$productList->pageSize}},
            theme: "#E4C670",
            curr: {{$productList->page}},
            jump: function(obj, first){
                //首次不执行
                if(!first){
                  window.location.href="/product/?page="+obj.curr;//向URL中传递页数并显示
                }
            }
        });
    });

    // alert($(".earnings_ul>li>.active").attr("name"))

    $(".earnings_ul>li").attr("name");

    $(".earnings_ul>li,.object_ul>li,.name_ul>li,.platform>div").click(function(){
        $(this).addClass("active").siblings().removeClass("active");
    })

</script>
@endsection