@extends('layouts.app') 
@section('title', '产品详情') 
@section('content')
<link rel="stylesheet" href="{{ URL::asset(Config::get('myconfig.oss_url')) }}css/produceDetails.css">
<link rel="stylesheet" href="{{ URL::asset(Config::get('myconfig.oss_url')) }}plugins/layui/css/layui.css">
<div class="details_top">
    <div class="datails_top_content">
        <div class="details_top_title clearfloat">
            <div onclick="window.location.href='/product'">大院返利</div>
            <span>&gt;</span>
            <span class="productName">{{$product->productInfo->productName}}</span>
            <div>
                <input type="hidden" class="platId" value="{{$product->productInfo->platId}}">
                <input type="hidden" class="id" value="{{$product->productInfo->id}}">
            </div>
        </div>
    </div>
    <!-- 返利 -->
    <div class="rebate_content clearfloat">
        <!-- 返利左侧 -->
        <div class="rebate_left">
            @if($product->productInfo->targeType == 1)
            <div class="badge">仅限首投</div>
            @elseif($product->productInfo->targeType == 2)
            <div class="badge">复投返利</div>
            @else 
            @endif
            <img src="{{$product->productInfo->logoUrl}}"> @isset($product->productInfo->productTags)
            <div class="tags">
                @foreach($product->productInfo->productTags as $tags)
                <div>{{$tags->tag}}</div>
                @endforeach
            </div>
            @endisset
        </div>
        <!-- 返利右侧 -->
        <div class="rebate_right clearfloat">
            <div class="item_title clearfloat">
                <h1 class="platName">{{$product->productInfo->platName}}</h1>
                <div class="attention">企业信息仅供参考，投资有风险，选择需谨慎</div>
            </div>
            <ul class="item_ul clearfloat">
                <li>
                    <div class="old_rebate">
                        <p>{{$product->productInfo->wddyMinRate}}
                            <span>%</span>- {{$product->productInfo->wddyMaxRate}}
                            <span>%</span>
                        </p>
                    </div>
                    <div>综合年化</div>
                </li>
                <li>
                    <div class="new_rebate">
                        <p>{{$product->productInfo->productMinRate}}
                            <span>%</span>- {{$product->productInfo->productMaxRate}}
                            <span>%</span>
                        </p>
                    </div>
                    <div>平台年化</div>
                </li>
                <li>
                    <div class="deadline">
                        {{$product->productInfo->minDueTime}}-{{$product->productInfo->maxDueTime}}
                         @if($product->productInfo->dueUnit==1) 天 
                         @elseif($product->productInfo->dueUnit == 2) 月
                         @elseif($product->productInfo->dueUnit==3) 年 
                         @else 
                         @endif
                    </div>
                    <div>投资期限</div>
                </li>
                <li>
                    <div class="borrow">{{$product->productInfo->minLendMoney}}元起投</div>
                    <div>投资额度范围</div>
                </li>
                <li>
                    <div class="borrow" style="color:#e23438;">{{$product->productInfo->fullReback}}元</div>
                    <div>每万元返利</div>
                </li>
            </ul>
            <div class="status">
                @empty($bankinfo)
                    <button id="btn_01" onclick="window.location.href='/account/info'">申请返利</button>
                @endempty 
                @isset($bankinfo)
                    @if($product->productInfo->platId == 1002)
                    <button class="btn_01" style="display:none">申请返利</button>
                    @elseif($product->productInfo->platId !== 1002)
                    <button class="btn_01">申请返利</button>
                    @else
                    @endif
                @endisset
                <button class="btn_02">直达注册</button>
            </div>
            @if($product->productInfo->platId == 1002)
            <div style="dispaly:block;" class="nonstop">该平台与网贷大院完成返利数据对接，通过直达注册链接注册平台完成投资后，满足活动方案规则即可在一个工作日左右自动获得返利奖励，无需手动申请返利记录，返利奖励前往<span style="color:#e23438">“账号总览”</span>中可查看并提现。</div>
            @endisset
        </div>
    </div>
</div>

<!-- 公告 -->
<div class="announcement">
    <div class="announcement_top clearfloat">
        <div class="announcement_left clearfloat">
            <i class="announcement_icon"></i>
            <p>公告&#x3000;|</p>
        </div>
        <div class="announcement_middle">
            <ul class="announcement_list">
                <li>
                    <div class="announcement_title">138****1658出借团贷网10000.00元获得58.00元大院返利 10分钟前</div>
                </li>
                <li>
                    <div class="announcement_title">183****6798出借掌盈金服50000.00元获得450.00元大院返利 20分钟前</div>
                </li>
                <li>
                    <div class="announcement_title">151****2824出借掌盈金服10000.00元获得90.00元大院返利 25分钟前</div>
                </li>
                <li>
                    <div class="announcement_title">186****3869出借掌盈网20000.00元获得100.00元大院返利 30分钟前</div>
                </li>
            </ul>
        </div>
        <!-- <div class="announcement_more">
                <a href="javascript:;">更多</a>
                <img src="{{ URL::asset(Config::get('myconfig.oss_url')) }}images/index/more.png">
            </div> -->
    </div>

</div>
</div>
<div class="details_bottom">
    <div class="details_bottom_title">
        <p>产品详情</p>
        <img src="{{ URL::asset(Config::get('myconfig.oss_url')) }}images/produceDetails/border.png">
    </div>
    <div class="messages">
        <div class="bottom_title clearfloat">
            <div class="icon"></div>
            <div>平台信息</div>
        </div>
        <section class="companty clearfloat">
            <div>
                <img src="https://wddy-live.oss-cn-hangzhou.aliyuncs.com/uploads/company_img.png">
                <h5>公司资料</h5>
                <div class="messages_details">
                    <?php echo $product->platCompanyInfo->companyInfo ?>
                </div>
            </div>
            <div>
                <img src="https://wddy-live.oss-cn-hangzhou.aliyuncs.com/uploads/safe_img.png">
                <h5>多重保障</h5>
                <div class="messages_details">
                    <?php echo $product->platCompanyInfo->safeInfo ?>
                </div>
            </div>
            <div>
                <img src="https://wddy-live.oss-cn-hangzhou.aliyuncs.com/uploads/backgroud_img.png">
                <h5>公司背景</h5>
                <div class="messages_details">
                    <?php echo $product->platCompanyInfo->backdropInfo ?>
                </div>
            </div>
        </section>
    </div>
    <!-- 返利活动 -->
    <div class="messages clearfloat">
        <div class="bottom_title clearfloat">
            <div class="icon"></div>
            <div>返利活动</div>
        </div>
        <table class="table">
            <tr>
                <td>投资金额（元）</td>
                <td>期限（天）</td>
                <td>大院返利（元）</td>
                <td>参考总回报（元）</td>
                <td>综合年化（百分比）</td>
            </tr>
            @foreach($product->rateInfos as $rateInfos)
            <tr>
                <td>{{$rateInfos->amount}}</td>
                <td>{{$rateInfos->timeLimit}}</td>
                <td>{{$rateInfos->reward}}</td>
                <td>{{$rateInfos->profit}}</td>
                <td>{{$rateInfos->rate}}</td>
            </tr>
            @endforeach
        </table>
    </div>
    <!-- 产品攻略 -->
    <div class="raiders">
        <div class="bottom_title clearfloat">
            <div class="icon"></div>
            <div>产品攻略</div>
        </div>
        <ul class="datails_text">
            <li>
                <?php echo $product->remarkList[0]->value ?>
            </li>
        </ul>
    </div>
    <!-- 注意事项 -->
    <div class="raiders">
        <div class="bottom_title clearfloat">
            <div class="icon"></div>
            <div>注意事项</div>
        </div>
        <ul class="datails_text">
            <li>
                <?php echo $product->remarkList[1]->value ?>
            </li>
        </ul>
    </div>
    <!-- 返利流程 -->
    <div class="flow">
        <div class="bottom_title clearfloat">
            <div class="icon"></div>
            <div>返利流程</div>
        </div>
        <ul class="flow_ul clearfloat">
            <li class="one_ion">
                <img src="{{ URL::asset(Config::get('myconfig.oss_url')) }}images/produceDetails/flow_01.png">
                <p>1、注册网贷大院</p>
            </li>
            <li></li>
            <li class="two_icon">
                <img src="{{ URL::asset(Config::get('myconfig.oss_url')) }}images/produceDetails/flow_02.png">
                <p>2、点击“直达注册”</p>
            </li>
            <li></li>
            <li class="three_icon">
                <img src="{{ URL::asset(Config::get('myconfig.oss_url')) }}images/produceDetails/flow_03.png">
                <p>3、完成投资</p>
            </li>
            <li></li>
            <li class="four_icon">
                <img src="{{ URL::asset(Config::get('myconfig.oss_url')) }}images/produceDetails/flow_04.png">
                <p>4、申请返利</p>
            </li>
        </ul>
    </div>
    <div class="messages" id="attention">
        <div class="bottom_title clearfloat">
            <div class="icon"></div>
            <div>免责声明</div>
        </div>
        <ul class="impunity">
        网贷大院仅为信息平台，您不会在大院有任何充值及投资行为。大院返利页面中的活动均来自平台方，仅作活动展示，不代表安全性，不构成投资建议。网贷有风险，请您谨慎选择参与活动，网贷大院将不承担相关责任。
        </ul>
    </div>
    <!-- 遮罩层 -->
    <div class="mask"></div>

    <!-- 返利单填写成功 -->
    <div class="approve">
        <div class="close"></div>
        <p>您的投资信息提交成功，预计1-3个工作日完成审核，请至个人中心-返利进度查看。</p>
        <a class="to_approve" href="/product">去出借</a>
    </div>
    <!-- 返利弹窗 -->
    <div class="rebate_window1">
        <div class="close"></div>
        <div class="receipt">
            <h3>填写返利回单
                <span>(注册平台投资后提交)</span>
            </h3>
            <p>每次投资完，我们根据您填写的回单给您结算返利，回单必填信息：投资金额、注册平台手机号、投资时间、投资类型、投资期限</p>
        </div>
        <div class="rebate_form">
        <!-- 回单1 -->
        <form>
            <div class="receipt_icon"><p>回单1</p></div>
            <ul class="rebate_form clearfloat">
                <li>
                    <p>返利快捷入口：</p>
                    <input value="{{$product->productInfo->productName}}" class="pro_name" readonly="readonly">
                    <div class="error_01"></div>
                </li>
                <li>
                    <p>实际投资金额（元）：</p>
                    <input type="text" class="pro_money" placeholder="请输入金额" autocomplete="off">
                    <div class="error_02"></div>
                </li>
                <li>
                    <p>注册平台手机号：</p>
                    <input type="text" class="pro_mobile" placeholder="请输入注册平台手机号" onkeyup="value=value.replace(/[^\d]/g,'')" maxlength="11" autocomplete="off">
                    <div class="error_03"></div>
                </li>
                <li>
                    <p>投资时间：</p>
                    <input type="text" class="pro_date" id="date1" autocomplete="off" placeholder="请选择投资时间">
                    <div class="error_04"></div>
                </li>
                <li>
                    <p>投资类型：</p>
                    <select class="rebate_user">
                        <option value="0">请选择投资类型</option>
                        <option value="1">首投</option>
                        <option value="2">复投</option>
                    </select>
                    <div class="error_05"></div>
                </li>
                <li>
                    <p>投资期限（天）：</p>
                    <input type="text" class="rebate_bank" placeholder="请输入投资期限" name="invest_time" autocomplete="off">
                    <div class="error_06"></div>
                </li>
            </ul>
        </form>
        <!-- 回单2 -->
        <form class="form1" style="display:none;" action="/rebate/add" method="post">
        <div class="receipt_icon"><p>回单2</p></div>
        <div class="shut1"></div>
            <ul class="rebate_form clearfloat">
                <li>
                    <p>返利快捷入口：</p>
                    <input value="{{$product->productInfo->productName}}" class="pro_name" readonly="readonly">
                </li>
                <li>
                    <p>实际投资金额（元）：</p>
                    <input type="text" class="pro_money" placeholder="请输入金额" autocomplete="off">
                    <div class="error_08"></div>
                </li>
                <li>
                    <p>注册平台手机号：</p>
                    <input type="text" class="pro_mobile" placeholder="请输入注册手机号" onkeyup="value=value.replace(/[^\d]/g,'')" maxlength="11" autocomplete="off">
                    <div class="error_09"></div>
                </li>
                <li>
                    <p>投资时间：</p>
                    <input type="text" class="pro_date" id="date2" placeholder="请输入投资时间" autocomplete="off">
                    <div class="error_10"></div>
                </li>
                <li>
                    <p>投资类型：</p>
                    <select class="rebate_user" name="type">
                        <option value="0">请选择投资类型</option>
                        <option value="1">首投</option>
                        <option value="2">复投</option>
                    </select>
                    <div class="error_11"></div>
                </li>
                <li>
                    <p>投资期限（天）：</p>
                    <input type="text" class="rebate_bank" placeholder="请输入投资期限" autocomplete="off">
                    <div class="error_12"></div>
                </li>
               
            </ul>
        </form>
        <!-- 回单3 -->
        <form class="form2" style="display:none;">
        <div class="receipt_icon"><p>回单3</p></div>
        <div class="shut2"></div>
            <ul class="rebate_form clearfloat">
                <li>
                    <p>返利快捷入口：</p>
                    <input value="{{$product->productInfo->productName}}" class="pro_name" readonly="readonly">
                </li>
                <li>
                    <p>实际投资金额（元）：</p>
                    <input type="text" class="pro_money" placeholder="请输入金额" autocomplete="off">
                    <div class="error_13"></div>
                </li>
                <li>
                    <p>注册平台手机号：</p>
                    <input type="text" class="pro_mobile" placeholder="请输入注册平台手机号" onkeyup="value=value.replace(/[^\d]/g,'')" maxlength="11" autocomplete="off">
                    <div class="error_14"></div>
                </li>
                <li>
                    <p>投资时间：</p>
                    <input type="text" class="pro_date" id="date3" placeholder="请输入投资时间" autocomplete="off">
                    <div class="error_15"></div>
                </li>
                <li>
                    <p>投资类型：</p>
                    <select class="rebate_user">
                        <option value="0">请选择投资类型</option>
                        <option value="1">首投</option>
                        <option value="2">复投</option>
                    </select>
                    <div class="error_16"></div>
                </li>
                <li>
                    <p>投资期限（天）：</p>
                    <input type="text" class="rebate_bank" placeholder="请输入投资期限" autocomplete="off">
                    <div class="error_17"></div>
                </li>
               
            </ul>
        </form>
        <!-- 回单4 -->
        <form class="form3" style="display:none;">
        <div class="receipt_icon"><p>回单4</p></div>
        <div class="shut3"></div>
            <ul class="rebate_form clearfloat">
                <li>
                    <p>返利快捷入口：</p>
                    <input value="{{$product->productInfo->productName}}" class="pro_name" readonly="readonly">
                </li>
                <li>
                    <p>实际投资金额（元）：</p>
                    <input type="text" class="pro_money" placeholder="请输入金额" autocomplete="off">
                    <div class="error_18"></div>
                </li>
                <li>
                    <p>注册平台手机号：</p>
                    <input type="text" class="pro_mobile" placeholder="请输入注册平台手机号" onkeyup="value=value.replace(/[^\d]/g,'')" maxlength="11" autocomplete="off">
                    <div class="error_19"></div>
                </li>
                <li>
                    <p>投资时间：</p>
                    <input type="text" class="pro_date" placeholder="请输入投资时间" id="date4" autocomplete="off">
                    <div class="error_20"></div>
                </li>
                <li>
                    <p>投资类型：</p>
                    <select class="rebate_user">
                        <option value="0">请选择投资类型</option>
                        <option value="1">首投</option>
                        <option value="2">复投</option>
                    </select>
                    <div class="error_21"></div>
                </li>
                <li>
                    <p>投资期限（天）：</p>
                    <input type="text" class="rebate_bank" placeholder="请输入投资期限" autocomplete="off">
                    <div class="error_22"></div>
                </li>       
            </ul>
        </form>
        <!-- 回单5 -->
        <form class="form4" style="display:none;">
        <div class="receipt_icon"><p>回单5</p></div>
        <div class="shut4"></div>
            <ul class="rebate_form clearfloat">
                <li>
                    <p>返利快捷入口：</p>
                    <input value="{{$product->productInfo->productName}}" class="pro_name" readonly="readonly">
                </li>
                <li>
                    <p>实际投资金额（元）：</p>
                    <input type="text" class="pro_money" placeholder="请输入金额" autocomplete="off">
                    <div class="error_23"></div>
                </li>
                <li>
                    <p>注册平台手机号：</p>
                    <input type="text" class="pro_mobile" placeholder="请输入注册手机号" onkeyup="value=value.replace(/[^\d]/g,'')" maxlength="11" autocomplete="off">
                    <div class="error_24"></div>
                </li>
                <li>
                    <p>投资时间：</p>
                    <input type="text" class="pro_date" id="date5" placeholder="请输入投资时间" autocomplete="off">
                    <div class="error_25"></div>
                </li>
                <li>
                    <p>投资类型：</p>
                    <select class="rebate_user">
                        <option value="0">请选择投资类型</option>
                        <option value="1">首投</option>
                        <option value="2">复投</option>
                    </select>
                    <div class="error_26"></div>
                </li>
                <li>
                    <p>投资期限（天）：</p>
                    <input type="text" class="rebate_bank" placeholder="请输入投资期限" autocomplete="off">
                    <div class="error_27"></div>
                </li>
            </ul>
        </form>
        </div>
        <div class="card_info clearfloat">
            <div class="cardName clearfloat">
                <p>收款人姓名：</p>
                <p class="bankUser">
                @isset($bankinfo->userName)
                {{$bankinfo->userName}}
                @endisset
        </p>
            </div>
            <div class="cardNum clearfloat">
                <p>收款账号</p>
                <p>
                    <span>
                     @isset($bankinfo->bank)   
                    （{{$bankinfo->bank}}）
                     @endisset({{$bankinfo->bank}})
                    </span>
                    <span class="cardNo">
                        @isset($bankinfo->cardNo)
                        {{$bankinfo->cardNo}}
                        @endisset
                    </span>
                </p>
            </div>
            <div class="codeInfo clearfloat">
                <label>验证码:</label>
                <input type="text" class="pro_time" placeholder="请输入验证码" onkeyup="value=value.replace(/[^\w\.\/]/ig,'')">
                <a href="javascript:void(0)" onclick="yzmfresh(this);" class="code">{!! captcha_img() !!}</a>
                <div class="error_07"></div>
            </div>
        </div>
        <button type="button" class="add_form">新申请返利</button>
        <button type="button" class="second_btn">提交</button>
    </div>
    <!-- 去P2P平台 -->
    <div class="others">
        <div class="rocket"></div>
        <div class="close"></div>
        <div class="others_top clerafloat">
            <div class="dylogo"></div>
                <span>正在前往</span>
                <img src="{{$product->productInfo->logoUrl}}" class="others_logo">
        </div>
        <div class="loading"></div>
        <div class="others_content">
            <p>温馨提示：请务必确保是
                <a>在跳转的页面上进行注册，</a>
                否则是不会产生返利的哦~~~</p>
        </div>
        <a class="first_btn" href="{{$product->productInfo->thirdUrl}}" target="_blank">继续前往</a>
    </div>
    <!-- 未绑卡 -->
    <!-- <div class="card">
        <div class="close"></div>
        <p>未绑卡用户提示</p>
        <p>请您先完成绑定银行卡</p>
        <button type="button" class="to_card">去绑定银行卡</button>
    </div> -->
</div>

<script src="{{ URL::asset(Config::get('myconfig.oss_url')) }}js/jquery.min.js"></script>
<script src="{{ URL::asset(Config::get('myconfig.oss_url')) }}plugins/layui/layui.js"></script>

<script>
    $(".headerTop_right>li").eq(0).find("a").removeClass("border01");
    $(".headerTop_right>li").eq(1).find("a").addClass("border01");

     $("input,select").focus(function () {
        $(this).siblings("div").text("");
    });
   

    layui.use('laydate', function(){
    var laydate = layui.laydate;
    laydate.render({
    elem: '#date1'
    ,theme: '#e4c760'
  });
   laydate.render({
    elem: '#date2'
    ,theme: '#e4c760'
    });
    laydate.render({
    elem: '#date3'
    ,theme: '#e4c760'
    });
    laydate.render({
    elem: '#date4'
    ,theme: '#e4c760'
    });
    laydate.render({
    elem: '#date5'
    ,theme: '#e4c760'
    });
    })
    // 验证码
    function yzmfresh(elem) {
        var src = $(elem).find('img');
        var http = src.attr('src').split('?')[0];
        src.attr('src', http + '?' + Math.random());
    }

    // 关闭弹窗
    $(".close").click(function () {
        $(".mask").hide();
        $(".card").hide();
        $(".others").hide();
        $(".approve").hide();
        $('form')[0].reset();
        $('form')[1].reset();
        $('form')[2].reset();
        $('form')[3].reset();
        $('form')[4].reset();
        $(".rebate_window1").hide();
        $(".rebate_window2").hide();
        $("input,select").siblings("div").text("");
    })

    // 返单填写成功
    function noApprove() {
        $(".mask").show();
        $(".approve").show();
        $(".rebate_window1").hide();
        $(".rebate_window2").hide();
    }
    // noApprove();

    // 未绑卡
    function noCard() {
        $(".mask").show();
        $(".card").show();
        $(".to_card").click(function () {
            window.location.href = "/account/info"
        })
    }
    // noCard()
    
    $(".btn_01").click(function () {
        $(".mask").show();
        $(".rebate_window1").show();
        
    })

    $(".btn_02").click(function () {
        $(".mask").show();
        $(".others").show();
    })
    
    // 添加回单
    var number = 0
    $(".add_form").click(function(){
       number+=1;
        if(number == 1){
            $(".form1").show();
        }
        else if(number == 2){
            $(".form2").show();
        }
        else if(number == 3){
            $(".form3").show();
        }
        else if(number == 4){
            $(".form4").show();
        }  
    })

    // 关闭回单
    $(".shut1,.shut2,.shut3,.shut4").click(function(){
        $('form')[0].reset();
        $('form')[1].reset();
        $('form')[2].reset();
        $('form')[3].reset();
        $('form')[4].reset();
       $(this).parent("form").hide();
    })

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

    $(".rebate_form>li>input").focus(function () {
        $(this).siblings("div").text("");
    })

    // 金额校验
    $(".pro_money").blur(function(obj) {
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

    // 提交返利
    $(".second_btn").click(function () {
        $("input,select").siblings("div").text("");
        // 判断标的名称是否为空
    if ($("form .pro_money").val() === "") {
        $(".error_02").text("请输入标的名称");
        return false;
    }

    // 判断投资金额是否为空
    else if ($("form .pro_mobile").val() === "") {
        $(".error_03").text("请输入注册平台手机号");
        return false;
    }
    // 判断投资日期是否为空
    else if ($(".pro_date").val() === "") {
        $(".error_04").text("请选择投资时间");
        return false;
    }
    // 判断投资类型是否为空
    else if ($(".rebate_user").val() === $(".rebate_user option:eq(0)").val()) {
        $(".error_05").text("请输入投资类型");
        return false;
    }
    // 判断投资期限否为空
    else if ($(".rebate_bank").val() === "") {
        $(".error_06").text("请输入投资期限");
        return false;
    }
    // 判断验证码否为空
    else if ($(".pro_time").val() === "") {
        $(".error_07").text("请输入验证码");
        return false;
    }

    // 验证表单1
    if ($(".form1").is(":hidden") == false) {
        if ($(".form1 .pro_money").val() === "") {
            $(".error_08").text("请输入标的名称");
            return false;
        }
        // 判断投资金额是否为空
        else if ($(".form1 .pro_mobile").val() === "") {
            $(".error_09").text("请输入注册平台手机号");
            return false;
        }
        // 判断投资日期是否为空
        else if ($(".form1 .pro_date").val() === "") {
            $(".error_10").text("请选择投资时间");
            return false;
        }
        // 判断投资类型是否为空
        else if ($(".form1 .rebate_user").val() === $(".form1 .rebate_user option:eq(0)").val()) {
            $(".error_11").text("请输入投资类型");
            return false;
        }
        // 判断投资期限否为空
        else if ($(".form1 .rebate_bank").val() === "") {
            $(".error_12").text("请输入投资期限");
            return false;
        }
    }

    // 验证表单2
    if ($(".form2").is(":hidden") == false) {
        if ($(".form2 .pro_money").val() === "") {
            $(".error_13").text("请输入标的名称");
            return false;
        }
        // 判断投资金额是否为空
        else if ($(".form2 .pro_mobile").val() === "") {
            $(".error_14").text("请输入注册平台手机号");
            return false;
        }
        // 判断投资日期是否为空
        else if ($(".form2 .pro_date").val() === "") {
            $(".error_15").text("请选择投资时间");
            return false;
        }
        // 判断投资类型是否为空
        else if ($(".form2 .rebate_user").val() === $(".form2 .rebate_user option:eq(0)").val()) {
            $(".error_16").text("请输入投资类型");
            return false;
        }
        // 判断投资期限否为空
        else if ($(".form2 .rebate_bank").val() === "") {
            $(".error_17").text("请输入投资期限");
            return false;
        }
    }

    if ($(".form3").is(":hidden") == false) {
        if ($(".form3 .pro_money").val() === "") {
            $(".error_18").text("请输入标的名称");
            return false;
        }
        // 判断投资金额是否为空
        else if ($(".form3 .pro_mobile").val() === "") {
            $(".error_19").text("请输入注册平台手机号");
            return false;
        }
        // 判断投资日期是否为空
        else if ($(".form3 .pro_date").val() === "") {
            $(".error_20").text("请选择投资时间");
            return false;
        }
        // 判断投资类型是否为空
        else if ($(".form3 .rebate_user").val() ===$(".form3 .rebate_user option:eq(0)").val()) {
            $(".error_21").text("请输入投资类型");
            return false;
        }
        // 判断投资期限否为空
        else if ($(".form3 .rebate_bank").val() === "") {
            $(".error_22").text("请输入投资期限");
            return false;
        }
    }

    if ($(".form4").is(":hidden") == false) {
        if ($(".form4 .pro_money").val() === "") {
            $(".error_23").text("请输入标的名称");
            return false;
        }
        // 判断投资金额是否为空
        else if ($(".form4 .pro_mobile").val() === "") {
            $(".error_24").text("请输入注册平台手机号");
            return false;
        }
        // 判断投资日期是否为空
        else if ($(".form4 .pro_date").val() === "") {
            $(".error_25").text("请选择投资时间");
            return false;
        }
        // 判断投资类型是否为空
        else if ($(".form4 .rebate_user").val() === $(".form4 .rebate_user option:eq(0)").val()) {
            $(".error_26").text("请输入投资类型");
            return false;
        }
        // 判断投资期限否为空
        else if ($(".form4 .rebate_bank").val() === "") {
            $(".error_27").text("请输入投资期限");
            return false;
        }
    }
    
        $.ajax({
            type: "post",
            url: "/rebate/add",
            dataType: "json",
            data: {
                id: $(".id").val(),
                platId: $(".platId").val(),
                bankUser: $(".bankUser").text(),
                productName: $(".productName").text(),
                platName: $(".platName").text(),
                cardNo: $(".cardNo").text(),
                _token: '{{ csrf_token() }}',
                amount: [$("form .pro_money").val(),$(".form1 .pro_money").val(),$(".form2 .pro_money").val(),$(".form3 .pro_money").val(),$(".form4 .pro_money").val()],
                phone: [$("form .pro_mobile").val(),$(".form1 .pro_mobile").val(),$(".form2 .pro_mobile").val(),$(".form3 .pro_mobile").val(),$(".form4 .pro_mobile").val()],
                invest_time: [$("form .pro_date").val(),$(".form1 .pro_date").val(),$(".form2 .pro_date").val(),$(".form3 .pro_date").val(),$(".form4 .pro_date").val()],
                type: [$("form .rebate_user option:selected").val(),$(".form1 .rebate_user option:selected").val(),$(".form2 .rebate_user option:selected").val(),$(".form3 .rebate_user option:selected").val(),$(".form4 .rebate_user option:selected").val()],
                peroid: [$("form .rebate_bank").val(),$(".form1 .rebate_bank").val(),$(".form2 .rebate_bank").val(),$(".form3 .rebate_bank").val(),$(".form4 .rebate_bank").val()],
                verifyCode: $(".pro_time").val(),
            },
            success: function (data) {
                if (data.errorno == 0) {
                    console.log(data);
                    noApprove();
                    // 
                    // alert(1)
                } else {
                    $(".error_07").text(data.rtndata);
                }
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {}
        })
    })
</script>
@endsection