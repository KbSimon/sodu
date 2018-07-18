@extends('layouts.app')
@section('title', '账号总览') 
@section('content')
<link rel="stylesheet" href="{{ URL::asset(Config::get('myconfig.oss_url')) }}css/base.css">
<link rel="stylesheet" href="{{ URL::asset(Config::get('myconfig.oss_url')) }}css/accountNew.css">

<div class="account clearfloat">
    <!-- 左侧 -->
    <div class="account_left">
        <!-- 左侧顶部  -->
        <div class="person_top">
            <div class="grade"></div>
            <div class="user">
                <img src="{{ URL::asset(Config::get('myconfig.oss_url')) }}/images/personalCenter/via.png">
                <p>{{Session::get('user.mobile', 0)}}</p>
            </div>
        </div>
        <!-- 左侧底部 -->
        <div class="person_bottom">
            <ul class="person_nav">
                <li class="active">
                    <a href="/account">账户总览</a>
                </li>
                <li>
                    <a href="/account/rebate">返利记录</a>
                </li>
                <li>
                    <a href="/account/money">邀请好友</a>
                </li>
                <li>
                    <a href="/account/info">账号设置</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- 右侧 -->
    <div class="account_right">
        <div class="account_bar">
            <!-- 邀请 -->
            <div class="grade_bar clearfloat">
                <div class="vip">
                    <img src="{{ URL::asset(Config::get('myconfig.oss_url')) }}images/personalCenter/vip.png">
                </div>
                <div class="invite_text clearfloat">
                    <div class="invite_left">
                        <p class="grade_text">您的邀请等级为
                        <span>
                            @if(Session::get('user.userGrade', 0)==1)
                            贫农
                            @elseif(Session::get('user.userGrade', 0)==2)
                            富农
                            @elseif(Session::get('user.userGrade', 0)==3)
                            地主
                            @elseif(Session::get('user.userGrade', 0)==4)
                            财主
                            @elseif(Session::get('user.userGrade', 0)==5)
                            富翁
                            @else
                            @endif
                            </span>，好友首次投资您可获奖励：
                            <span>
                            @if(Session::get('user.userGrade', 0)==1)
                            10元
                            @elseif(Session::get('user.userGrade', 0)==2)
                            5%
                            @elseif(Session::get('user.userGrade', 0)==3)
                            10%
                            @elseif(Session::get('user.userGrade', 0)==4)
                            15%
                            @elseif(Session::get('user.userGrade', 0)==5)
                            20%
                            @else
                            @endif
                            </span>； 持续投资您可获奖励：
                            <span>
                            @if(Session::get('user.userGrade', 0)==1)
                            1%
                            @elseif(Session::get('user.userGrade', 0)==2)
                            2%
                            @elseif(Session::get('user.userGrade', 0)==3)
                            3%
                            @elseif(Session::get('user.userGrade', 0)==4)
                            5%
                            @elseif(Session::get('user.userGrade', 0)==5)
                            8%
                            @else
                            @endif
                            </span>。</p>
                        <a class="grade_up" href="/product">快速提升等级 &gt;&gt;</a>
                    </div>
                    <div class="invite_right">邀请码：{{$accountinfo->userInvitationCode}}</div>
                </div>

            </div>
            <!-- 账户 -->
            <div class="balance_bar clearfloat">
                <div class="balance_left">
                    <p class="balance_title">网贷大院账户余额</p>
                    <p class="balance_money1">{{$accountinfo->userAccount->balance}}
                        <span>元</span>
                    </p>
                </div>
                <ul class="balance_right clearfloat">
                    <li>
                        <p class="balance_title">待收收益</p>
                        <p class="balance_money2">{{$accountinfo->auditRebatePrice}}
                            <span>元</span>
                        </p>
                    </li>
                    <li>
                        <p class="balance_title">累计收益</p>
                        <p class="balance_money2">{{$accountinfo->userAccount->accumulation}}
                            <span>元</span>
                        </p>
                    </li>
                    <li>
                        <p class="balance_title">审核中回单数</p>
                        <p class="balance_money2">{{$accountinfo->auditRebateCount}}
                            <span>条</span>
                        </p>
                    </li>
                </ul>
            </div>
            <!-- 提现 -->
            <button class="withdraw">提现</button>
        </div>
        <div class="account_data">
            <div class="data_top clearfloat">
                <div class="detais_title">收益明细</div>
                <div class="detais_text">用户资金明细查看</div>
            </div>
            <table class="details_table">
                <tbody>
                    <tr>
                        <td>交易时间</td>
                        <td>交易类型</td>
                        <td>投资平台</td>
                        <td>金额（元）</td>
                        <td>余额（元）</td>
                    </tr>
                    @foreach($accountinfo->userBillList as $list)
                    <tr>
                        <td>{{$list->createTime}}</td>
                        <td>
                            @if($list->type===1)返利
                            @elseif($list->type===2)红包
                            @elseif($list->type===3)提现
                            @else
                            @endif
                        </td>
                        <td>{{$list->platName}}</td>
                        @if($list->type===1)
                        <td class="money1">+{{$list->price}}</td>
                        @elseif($list->type===2)
                        <td class="money1">+{{$list->price}}</td>
                        @elseif($list->type===3)
                        <td class="money2">-{{$list->price}}</td>
                        @else
                        @endif
                        <td>{{$list->currentBalance}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- 遮罩层 -->
<div class="mask"></div>
<!-- 弹窗 -->
<div class="window">
    <div class="close"></div>
    <div class="window_top">
        <p>账户提现</p>
        <p class="window_money">可提现金额{{$accountinfo->userAccount->balance}}元</p>
    </div>
    <div class="window_content">
        <form>
        <div class="input_money">
            @isset($accountinfo->userBank)
            <label>提现金额：</label>
            @endisset
            @isset($accountinfo->userBank)
            <input type="text">元
            @endisset
        </div>
        <div class="input_card">
        <label>到账至银行卡：</label>
            @empty($accountinfo->userBank)
            <div>请前往账号设置页面绑卡</div>
            @endempty
            @isset($accountinfo->userBank)
            <input type="text" readonly="readonly" value="{{$accountinfo->userBank->bank}}">
            @endisset
            @isset($accountinfo->userBank)
            <input type="text" readonly="readonly" value="{{$accountinfo->userBank->cardNo}}">
            @endisset
        </div>
    </div>
    </form>
    @isset($accountinfo->userBank)
    <button class="withdraw_btn">确认提现</button>
    @endisset
    @empty($accountinfo->userBank)
    <button id="withdraw_btn" onclick="window.location.href='/account/info'">前往绑卡</button>
    @endempty
</div>

<script src="{{ URL::asset(Config::get('myconfig.oss_url')) }}js/jquery.min.js"></script>
<script>
    $(".headerTop_right li a").removeClass("border01");

    $(".withdraw").click(function () {
        $(".mask").show();
        $(".window").show();
    })

    // 关闭弹窗
    $(".close").click(function () {
        $(".mask").hide();
        $(".window").hide();
        $('form')[0].reset();
    })

    function close(){
        $(".mask").hide();
        $(".window").hide();
        $('form')[0].reset();
    }

     // 金额校验
     $(".input_money>input").blur(function(obj) {
         $(this).val(parseFloat($(this).val()));
        if($(this).val().length - ($(this).val().indexOf('.') + 1) >= 1) {
            $(this).val(parseFloat($(this).val()).toFixed(2));
        }
        if(parseFloat($(this).val()) < 1 && parseFloat($(this).val()) > 0) {
            if($(this).val().split('.')[0].length >= 2) {
                $(this).val($(this).val().substring($(this).val().split('.')[0].length - 1, ($(this).val().length)));
            }
        }
    });

     $(".withdraw_btn").click(function(){
        if($(".input_money>input").val()==""){
            alert("提现金额不能为空！");
            return false;
        }
        $.ajax({
            type: "post",
            url: "/account/tixian",
            dataType: "json",
            data: {
                money: $(".input_money>input").val(),
                _token: '{{ csrf_token() }}',
                type: 3,
            },
            success: function (data) {
                if(data.errorno === 0){
                    alert("提现申请成功！");
                    close();
                }else{
                    alert(data.rtndata); // 处理登录失败错误信息
                }
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {}
        });
    })
</script>
 @endsection