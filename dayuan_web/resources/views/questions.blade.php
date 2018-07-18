@extends('layouts.app') 
@section('title', '常见问题')
@section('content')
<link rel="stylesheet" href="{{ URL::asset(Config::get('myconfig.oss_url')) }}css/questions.css">

<div class="questions">
    <div class="questions_title">
        <p>
            <a href="/">首页&gt;</a>常见问题</p>
    </div>
    <div class="questions_content clearfloat">
        <div class="questions_left">
            <div class="icon"></div>
            <div class="questions_list">
                <!-- 新手入门 -->
                <div class="questions_item">
                    <div class="item_head clearfloat">
                        <div class="active_01">新手入门</div>
                        <i class="arrows_01"></i>
                    </div>
                    <ul class="questions_ul">
                        <li>
                            <div class="active_02">注册登录</div>
                            <span class="arrows_05"></span>
                        </li>
                        <li>
                            <div class="active_03">名词解释</div>
                            <span class="arrows_02"></span>
                        </li>
                    </ul>
                </div>
                <!-- 进阶学习 -->
                <div class="questions_item">
                    <div class="item_head clearfloat">
                        <div>进阶学习</div>
                        <i class="arrows_04"></i>
                    </div>
                    <ul class="questions_ul">
                        <li>
                            <div class="active_03">返利秘籍</div>
                            <span class="arrows_02"></span>
                        </li>
                        <li>
                            <div class="active_03">返利申请</div>
                            <span class="arrows_02"></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="questions_right">
            <section class="newbice">
                <div class="login">
                    <div class="questions_headline">
                        <h4>注册登录</h4>
                        <h5>REGISTERED LOGIN</h5>
                    </div>
                    <div class="questions_details">
                        <p class="details_title">1. 如何成为大院的一员？</p>
                        <p class="details_text">登录大院首页点击“立即注册”，进入注册页面按提示完成注册。</p>
                        <p class="details_title">2. 注册大院有哪些条件？</p>
                        <p class="details_indent">中华人民共和国公民（不包括中国香港、澳门及台湾地区）年龄在18周岁以上、具有完全民事行为能力的自然人。</p>
                        <p class="details_title">3. 为什么手机号已存在？</p>
                        <p class="details_indent">如出现手机号已存在的提示，则说明您的手机号已被注册，不能重复使用。如您已注册但忘记注册信息，请不要尝试再次注册，您可以联系大院管家（400-0058-669）核实身份信息后找回账号。</p>
                        <p class="details_title">4. 注册时，进行手机验证，收不到短信怎么办？</p>
                        <p class="details_text">① 请确认手机是否安装短信拦截或过滤软件；</p>
                        <p class="details_text">② 请确认手机是否能够正常接收短信（是否存在信号不佳、欠费停机等问题）；</p>
                        <p class="details_text">③ 短信收发过程中可能会存在延迟，请耐心等待，短信在5分钟内均有效；</p>
                        <p class="details_text">④ 您可以联系大院管家（400-0058-669），寻求帮助；</p>
                    </div>
                </div>
                <div class="explain">
                    <div class="questions_headline">
                        <h4>名词解释</h4>
                        <h5>GLOSSARY</h5>
                    </div>
                    <div class="questions_details">
                        <p class="details_title">1. 新注册用户：</p>
                        <p class="details_text">大院的新注册用户。</p>
                        <p class="details_title">2. 首次注册平台：</p>
                        <p class="details_text">第一次注册P2P平台的用户。</p>
                        <p class="details_title">3. 首投：</p>
                        <p class="details_text">通过大院链接直达某P2P平台所发生的首次出借行为。</p>
                        <p class="details_title">4. 复投：</p>
                        <p class="details_text">通过大院链接直达某P2P平台所发生的再次出借行为。</p>
                        <p class="details_title">5. 平台年化：</p>
                        <p class="details_text">入驻大院的平台的年化利率。</p>
                        <p class="details_title">6. 返利：</p>
                        <p class="details_text">由大院额外给您的奖励。该部分奖励来自于平台支付给大院的信息服务费用。</p>
                        <p class="details_title">7. 综合年化：</p>
                        <p class="details_text">由入驻大院的平台的年化利率、平台自身活动奖励与大院返利三者之和计算得出的最终年化收益。</p>
                    </div>
                </div>
            </section>
            <section class="advance">
                <div class="cheats">
                    <div class="questions_headline">
                        <h4>返利秘籍</h4>
                        <h5>REBATE CHEATS</h5>
                    </div>
                    <div class="questions_details">
                        <p class="details_title">1. 怎样才能在大院获得返利？</p>
                        <p class="details_indent">您通过手机号注册网贷大院后，点击我们的专属链接跳转至目标平台，用相同手机号注册平台账号，参与规定活动，即可享受奖励。</p>
                        <p class="details_indent" style="font-weight: bold;">请注意，如果您在注册网贷大院之前，已使用过此手机号注册或者绑定过账户，您将不会获得奖励。</p>
                        <p class="details_title">2. 大院如何选择入驻平台？</p>
                        <p class="details_indent">所有入驻大院的平台全部经过风控模型的严格筛选评级，入驻后，大院还将持续进行信息披露，包括平台的股东变更，投资项目的进展，项目的风险性评估等。</p>
                        <p class="details_title">3. 返利是如何计算的？</p>
                        <p class="details_text">网贷大院提供返利的公式如下：</p>
                        <p class="details_text">按天出借的返利金额=出借金额*（出借天数/365天）*返利比例</p>
                        <p class="details_text">按月出借的返利金额=出借金额*（出借月份/12月）*返利比例</p>
                    </div>
                </div>
                <div class="apply">
                    <div class="questions_headline">
                        <h4>返利申请</h4>
                        <h5>REBATE APPLY</h5>
                    </div>
                    <div class="questions_details">
                        <p class="details_title">1. 如何申请返利？</p>
                        <p class="details_indent">您可以随时在大院“个人中心”中根据指引申请返利。</p>
                        <p class="details_indent">注意：请根据网站提示在返利单中提供申请返利的银行卡账号，并确保该账号的开户人姓名和账号相符，否则无法成功返利。</p>
                        <p class="details_title">2. 申请返利后，多久能到账？</p>
                        <p class="details_indent">大院收到您的返利申请后即对返利进行核准，由于不同银行处理速度不同，返利将会在1-3个工作日之内到账（如遇双休日或法定节假日顺延）。如果您迟迟未收到返利，可能为银行卡信息填写有误，银行正在退款操作，预计会在7个工作日内完成，请您耐心等候。您还可以联系大院管家（400-0058-669）寻求帮助。</p>
                        <p class="details_title">3. 返利手续费是多少？</p>
                        <p class="details_text">大院返利暂不收取手续费。</p>
                        <p class="details_title">4. 为什么会返利失败？</p>
                        <p class="details_text">造成您返利失败的原因可能有以下几种：</p>
                        <p class="details_text">① 银行账号/户名错误，或是账号和户名不符；</p>
                        <p class="details_text">② 银行账户冻结或正在办理挂失；</p>
                        <p class="details_text">③ 省份、城市、开户行等银行信息错误；</p>
                        <p class="details_text">④ 使用信用卡；</p>
                        <p class="details_indent">如果遇到以上情况，我们会在收到通知后及时处理，请您不必担心无法获得返利。</p>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <div class="questions_bottom">
        <p class="statement">免责声明</p>
        <p>网贷大网贷大院仅为信息平台，您不会在大院有任何充值及投资行为。大院返利页面中的活动均来自平台方，仅作活动展示，不代表安全性，不构成投资建议。网贷有风险，请您谨慎选择参与活动，网贷大院将不承担相关责任。</p>
    </div>
</div>

<script src="{{ URL::asset(Config::get('myconfig.oss_url')) }}js/jquery.min.js"></script>
<script>
    $(".headerTop_right li a").removeClass("border01");

    // 左侧效果
    $(".questions_item").click(function () {
        $(".item_head").find("div").addClass("active_01");
        $(".item_head").find("i").addClass("arrows_01").removeClass("arrows_04");
        $(this).siblings().find("div").removeClass("active_01")
        $(this).siblings().find("i").removeClass("arrows_01").addClass("arrows_04");
        $(".questions_right>section").eq($(this).index()).show().siblings().hide();
    })

    $(".questions_ul>li").click(function () {
        $(this).find("div").addClass("active_02").removeClass("active_03");
        $(this).find("span").addClass("arrows_05").removeClass("arrows_02");
        $(this).siblings().find("div").addClass("active_03").removeClass("active_02");
        $(this).parents().siblings().find("li").find("div").addClass("active_03").removeClass("active_02");
        $(this).siblings().find("span").removeClass("arrows_05").addClass("arrows_02");
        $(this).parents().siblings().find("li").find("span").removeClass("arrows_05").addClass("arrows_02");
    })

    // 右侧效果
    $(".questions_ul>li").click(function () {
        $(".newbice>div").eq($(this).index()).show().siblings().hide();
    });
    $(".questions_ul>li").click(function () {
        $(".advance>div").eq($(this).index()).show().siblings().hide();
    })
</script>
@endsection