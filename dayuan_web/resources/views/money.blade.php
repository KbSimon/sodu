@extends('layouts.app') 
@section('title', '邀请好友')
@section('content')
<link rel="stylesheet" href="{{ URL::asset(Config::get('myconfig.oss_url')) }}css/base.css">
<link rel="stylesheet" href="{{ URL::asset(Config::get('myconfig.oss_url')) }}css/invite.css">
<link rel="stylesheet" href="{{ URL::asset(Config::get('myconfig.oss_url')) }}plugins/layui/css/layui.css">

<div class="banner">
    <div class="banner_content">
        <div class="banner_bg"></div>
        <div class="frame">
            <div class="grade">
                @if(Session::get('user.userGrade', 0)==1)贫农
                @elseif(Session::get('user.userGrade', 0)==2)富农
                @elseif(Session::get('user.userGrade', 0)==3)地主
                @elseif(Session::get('user.userGrade', 0)==4)财主
                @elseif(Session::get('user.userGrade', 0)==5)富翁
                @else
                @endif
            </div>
            <div class="frame_top clearfloat">
                <div class="vip"></div>
                <div class="invite_title">
                邀请等级：@if(Session::get('user.userGrade', 0)==1)<span>贫农</span>    
                @elseif(Session::get('user.userGrade', 0)==2)<span>富农</span>    
                @elseif(Session::get('user.userGrade', 0)==3)<span>地主</span>        
                @elseif(Session::get('user.userGrade', 0)==4)<span>财主</span>            
                @elseif(Session::get('user.userGrade', 0)==5)<span>富翁</span>  
                @else
                @endif 好友首次投资您可获奖励
                <span>@if(Session::get('user.userGrade', 0)==1)10元
                @elseif(Session::get('user.userGrade', 0)==2)5%
                @elseif(Session::get('user.userGrade', 0)==3)10%
                @elseif(Session::get('user.userGrade', 0)==4)15%
                @elseif(Session::get('user.userGrade', 0)==5)20%
                @else
                @endif</span></div>
                <a href="/product" class="up">快速提升等级 &gt;&gt;</a>
            </div>
            <div class="address clearfloat">
                <label>你的邀请地址:</label>
                <input type="text" class="address_input" id="link" readonly="readonly" value="{{$invite->url}}">
                <button class="address_button" onclick="copy()">复制链接</button>
            </div>
        </div>
    </div>
</div>
<div class="part_01">
    <div class="unroca"></div>
    <div class="friends clearfloat">
        <table class="first_table">
            <tbody>
                <tr>
                    <td>会员等级</td>
                    <td>
                        <div>贫农</div>
                    </td>
                    <td>
                        <div>富农</div>
                    </td>
                    <td>
                        <div>地主</div>
                    </td>
                    <td>
                        <div>财主</div>
                    </td>
                    <td>
                        <div>富翁</div>
                    </td>
                </tr>
                <tr>
                    <td>待收本金</td>
                    <td><10000</td>
                    <td>≥10000</td>
                    <td>≥50000</td>
                    <td>≥100000</td>
                    <td>≥200000</td>
                </tr>
                <tr>
                    <td>累计邀请</td>
                    <td>1个有效用户</td>
                    <td>2个有效用户</td>
                    <td>5个有效用户</td>
                    <td>10个有效用户</td>
                    <td>20个有效用户</td>
                </tr>
                <tr>
                    <td>邀请人奖励</td>
                    <td>10元</td>
                    <td>5%</td>
                    <td>10%</td>
                    <td>15%</td>
                    <td>20%</td>
                </tr>
            </tbody>
        </table>
        <table class="first_table">
            <tbody>
                <tr>
                    <td>会员等级</td>
                    <td>
                        <div>贫农</div>
                    </td>
                    <td>
                        <div>富农</div>
                    </td>
                    <td>
                        <div>地主</div>
                    </td>
                    <td>
                        <div>财主</div>
                    </td>
                    <td>
                        <div>富翁</div>
                    </td>
                </tr>
                <tr>
                    <td>待收本金</td>
                    <td><10000</td>
                    <td>≥10000</td>
                    <td>≥50000</td>
                    <td>≥100000</td>
                    <td>≥200000</td>
                </tr>
                <tr>
                    <td>累计邀请</td>
                    <td>1个有效用户</td>
                    <td>2个有效用户</td>
                    <td>5个有效用户</td>
                    <td>10个有效用户</td>
                    <td>20个有效用户</td>
                </tr>
                <tr>
                    <td>邀请人奖励</td>
                    <td>1%</td>
                    <td>2%</td>
                    <td>3%</td>
                    <td>5%</td>
                    <td>8%</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="grade_text clearfloat">
        <p>注：1、以上两项要求，满足其中之一，自动升级。<br>
           &#x3000;&#x3000;2、有效用户定义：受邀好友有投资记录，方为有效用户。<br>
           &#x3000;&#x3000;3、在投金额：大院仅从投资日和标的期限推算在投期限，不受平台何时满标起息影响。例如：您于6月1日通过大院前往甲平台进行注册并完成投资（金额A），又于6月2日通过大院前往乙平台进行注册并完成投资（金额B），假设两次标的期限均为30天，那么6月1日和7月1日的在投金额分别为A和B，6月2日至6月30日期间的在投金额为A+B。<br>
           &#x3000;&#x3000;4、邀请人奖励规则：贫农固定奖励10元，其他根据受邀好友的投资返利及您的会员等级所对应的奖励比例发放奖励。</p>
           <p>注：受邀好友通过大院链接完成的每一笔投资，如有投资返利，您可持续享受邀请奖励。</p>
        </div>
        <div class="grade_text">
        </div>
</div>
<div class="part_02">
    <div class="invite_rules clearfloat">
        <div class="rules_title"></div>
        <div class="rules_left"></div>
        <div class="rules_right">
            <p>受邀好友必须是通过您的专属链接或邀请码注册的网贷大院用户。</p>
            <p>受邀好友在完成平台投资并获得返利时，大院将根据受邀好友的投资返利及您的会员等级所对应的奖励比例为您发放现金奖励，您可在“个人中心”查看并提现。</p>
            <p>邀请好友越多，好友投资返利越高，您的邀请奖励也会越高。</p>
            <p>活动最终解释权归杭州大院数据科技有限公司所有。</p>
        </div>
    </div>
    <div class="invite_data">
        <ul class="invite_people clearfloat">
            <li>
                <div class="people_icon"></div>
                <p class="invite_p">已邀好友：
                    <span>{{$invite->userInviteCount}}</span>人</p>
            </li>
            <li>
                <div class="people_icon"></div>
                <p class="invite_p">已投资好友：
                    <span style="color:#dde9ff">{{$invite->investmentCount}}</span>人</p>
            </li>
            <li>
                <div class="money_icon"></div>
                <p class="invite_p">累计邀请奖励：
                    <span style="color:#ffecb6">{{$invite->packetSum}}</span>元</p>
            </li>
        </ul>
        <table class="invite_table">
            <tr>
                <td colspan="2">&lt;邀请好友记录&gt;</td>
            </tr>
            <tr>
                <td>已邀好友</td>
                <td>邀请时间</td>
            </tr>
            @foreach($invite->userInviteList as $inviteList)
            <tr>
                <td>{{$inviteList->inviteName}}</td>
                <td>{{$inviteList->inviteTime}}</td>
            </tr>
            @endforeach
            @empty($invite->userInviteList)
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            @endempty
            <td colspan="2">
                <div id="laypages_01"></div>
            </td>
        </table>
    </div>
</div>
<script src="{{ URL::asset(Config::get('myconfig.oss_url')) }}js/jquery.min.js"></script>
<script src="{{ URL::asset(Config::get('myconfig.oss_url')) }}plugins/layui/layui.js"></script>
<script>
    $(".headerTop_right li a").removeClass("border01");

    // 复制
    function copy() {
        var ele = document.getElementById("link");
        ele.select();
        document.execCommand("Copy");
        alert("复制成功");
    }

    
     layui.use(['laypage', 'layer'], function () {
        var laypage = layui.laypage,
            layer = layui.layer;
        laypage.render({
            elem: 'laypages_01',
            count: {{$invite->page->count}},
            limit: 3,
            theme: "#6FA6F2",
            curr: {{$invite->page->currentPage}},
            jump: function(obj, first){
                //首次不执行
                if(!first){
                  window.location.href="/account/money/?page="+obj.curr;//向URL中传递页数并显示
                }
            }
        });
    });
</script>
@endsection