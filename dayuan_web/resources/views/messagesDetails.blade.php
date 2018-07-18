@extends('layouts.app')
@section('title', '资讯详情')
@section('content')
<link rel="stylesheet" href="{{ URL::asset(Config::get('myconfig.oss_url')) }}css/messagesDetails.css">
<div class="messagesDetails clearfloat">
    <div class="messagesDetails_left">
        <div class="messagesDetails_nav">
            <p><a href="/news">大院资讯</a>&#x3000;&gt;&#x3000;资讯详情</p>
            <img src="../images/messagesDetails/border.png">
        </div>
        <div class="messagesDetails_content">
            <div class="messagesDetails_title">{{$news->title}}</div>
            <ul class="subhead clearfloat">
                <li class="state_number">
                    <div class="state_number_left clearfloat">
                        <p class="source">来源：
                            <span>{{$news->author_id}}</span>
                        </p>
                        <p class="date">{{$news->updated_at}}</p>
                    </div>
                </li>
                <li class="state_div">
                <?php $keysarr = explode(',', $news->keys) ?>
                        @foreach($keysarr as $key)
                          <div>{{$key}}</div>
                         @endforeach
                </li>
            </ul>
            <div class="messagesDetails_text">
                <p><?php echo $news->content; ?></p>
            </div>
        </div>
    </div>
    <div class="messagesDetails_right">
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
        <!-- 热门排行 -->
        <div class="hot_rank">
            <div class="hot_rank_top">热门资讯</div>
            <ul class="hot_ul clearfloat">
                @foreach ($hotlist as $hotlist)
                <li>
                    <a href="{{$hotlist->id}}">{{$hotlist->title}}</a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

<script src="{{ URL::asset(Config::get('myconfig.oss_url')) }}js/jquery.min.js"></script>
<script>
    $(".headerTop_right>li").eq(0).find("a").removeClass("border01");
    $(".headerTop_right>li").eq(2).find("a").addClass("border01");
</script>
@endsection