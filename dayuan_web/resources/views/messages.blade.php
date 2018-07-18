@extends('layouts.app') 
@section('title', '网贷资讯--提供P2P理财行业相关资讯--网贷大院')
@section('keywords','网贷资讯，P2P网贷，P2P理财，网贷大院资讯')
@section('description', '网贷大院资讯频道是P2P理财、大院专栏、平台动态的资讯中心,包含有大院专栏、热点资讯、平台动态、网贷观点、行业数据、P2P理财、业内访谈、互联网金融等资讯内容，了解更多p2p网贷新闻请关注大院资讯。') 
@section('content')
<link rel="stylesheet" href="{{ URL::asset(Config::get('myconfig.oss_url')) }}css/messages.css">
<link rel="stylesheet" href="{{ URL::asset(Config::get('myconfig.oss_url')) }}plugins/layui/css/layui.css">
<link rel="stylesheet" href="{{ URL::asset(Config::get('myconfig.oss_url')) }}plugins/swiper/swiper.min.css">
<div class="messages">
    <!-- 上面 -->
    <div class="messages_top clearfloat">
        <div class="banner swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="{{ URL::asset(Config::get('myconfig.oss_url')) }}images/messages/banner.png">
                </div>
            </div>
            <!-- Add Pagination -->
            <!-- <div class="swiper-pagination"></div> -->
        </div>
        <!-- 行业新闻 -->
        <div class="today">
          <div class="hot_rank_top">独家新闻</div>
          <div class="today_bottom">
            @foreach ($industry as $industry)
            <div class="todayNew02">
                <p class="todayNew02_title" onclick="window.location.href='/news/{{$industry->id}}'">{{$industry->title}}</p>
                <a href="/news/{{$industry->id}}" class="todayNew02_text">{{$industry->part}}</a>
            </div>
            @endforeach
          </div>
        </div>
    </div>
    <div class="mesages_content clearfloat">
        <!-- 最新动态 -->
        <div class="new_state">
            <div class="new_state_top">行业新闻</div>
            <div class="new_state_bottom">
                @foreach ($onlyNews->data as $only)
                <section class="state_ul clearfloat">
                    <div class="state_left">
                        @if($only->image === Null)
                        <img src="{{ URL::asset(Config::get('myconfig.oss_url'))}}uploads/defult_news.png">
                        @elseif($only->image !== Null)
                        <img src="{{$only->image}}">
                        @else
                        @endif
                    </div>
                    <div class="state_right">
                        <ul class="state_content">
                            <li class="state_title" onclick="window.location.href='/news/{{$only->id}}'">{{$only->title}}</li>
                            <li class="state_div">
                            <?php $keysarr = explode(',', $only->keys) ?>
                                @foreach($keysarr as $key)
                                <div>{{$key}}</div>
                                @endforeach
                            </li>
                            <li>
                                <a href="/news/{{$only->id}}" class="state_text">{{$only->part}}
                                </a>
                            </li>
                            <li class="state_number">
                                <p class="source">来源：
                                    <span>{{$only->author}}</span>
                                </p>
                                <p class="date">{{$only->updated_at}}</p>
                            </li>
                        </ul>
                    </div>
                </section>
                @endforeach
                <div id="laypages_01">
                </div>
            </div>
        </div>
        <!-- 热门排行 -->
        <div class="hot_rank">
            <div class="hot_rank_top">热点资讯</div>
            <ul class="hot_ul clearfloat">
                @foreach ($hotlist as $hotlist)
                <li>
                    <a href="news/{{$hotlist->id}}">{{$hotlist->title}}</a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

<script src="{{ URL::asset(Config::get('myconfig.oss_url')) }}js/jquery.min.js"></script>
<script src="{{ URL::asset(Config::get('myconfig.oss_url')) }}plugins/layui/layui.js"></script>
<script src="{{ URL::asset(Config::get('myconfig.oss_url')) }}plugins/swiper/swiper.min.js"></script>
<script>
    var swiper = new Swiper('.swiper-container', {
        autoplay: {
            delay: 2500,
            disableOnInteraction: true,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
    });
    swiper.el.onmouseover = function () {
        swiper.autoplay.stop();
    }
    swiper.el.onmouseout = function () {
        swiper.autoplay.start();
    }

    // 分页
    layui.use(['laypage', 'layer'], function () {
        var laypage = layui.laypage,
            layer = layui.layer;
        laypage.render({
            elem: 'laypages_01',
            count: {{$onlyNews->total}},
            limit: {{$onlyNews->per_page}},
            theme: "#e4c760",
            curr: {{$onlyNews->current_page}},
            jump: function(obj, first){
                //首次不执行
                if(!first){
                  window.location.href="/news/?page="+obj.curr;//向URL中传递页数并显示
                }
            }
        });
     });
</script>
@endsection