@extends('layouts.app') 
@section('title', '注册') 
@section('content')
<link rel="stylesheet" href="{{ URL::asset(Config::get('myconfig.oss_url')) }}css/register.css">
<div class="register clearfloat">
    <div class="states">
        <!-- <div class="register_left"></div> -->
        <div class="register_right">
            <div class="register_right_top">
                <p>欢迎加入网贷大院</p>
                <section>已有账号?
                    <a href="/login">去登录</a>
                </section>
            </div>
            <form action="">
                <div class="phone">
                    <input type="text" class="phone_inp" placeholder="请输入手机号" required maxlength="11">
                    <p class="error_01"></p>
                </div>
                <div class="password">
                    <input type="password" class="pwd_inp" placeholder="请输入密码" required maxlength="16">
                    <p class="error_04"></p>
                </div>
                <div class="pwdAgain">
                    <input type="password" class="pwdAgain_inp" placeholder="请确认密码" required maxlength="16">
                    <p class="error_05"></p>
                </div>
                <div class="code">
                    <input type="text" class="code_inp" placeholder="请输入验证码" required onkeyup="value=value.replace(/[^\w\.\/]/ig,'')">
                    <button class="get_code" type="button">获取验证码</button>
                    <p class="error_02"></p>
                </div>
                <div class="img_code">
                    <input type="text" class="img_inp" placeholder="请输入图片验证码" required onkeyup="value=value.replace(/[^\w\.\/]/ig,'')">
                    <a href="javascript:void(0)" onclick="yzmfresh(this);">{!! captcha_img() !!}</a>
                    <p class="error_03"></p>
                </div>
                <div class="inviteCode">
                    <input type="text" class="invite_code" placeholder="请输入邀请码（*可不填）" required onkeyup="value=value.replace(/[^\w\.\/]/ig,'')">
                </div>
                <div class="login_state clearfloat">
                    <div class="rember deal">
                        <input type="checkbox" id="deal_input" checked>
                        <label for="deal_input"> </label>
                        <span>我已阅读并同意
                            <a class="to_protocol">《用户协议》</a>
                        </span>
                    </div>
                </div>
                <button type="button" class="register_btn">注册</button>
            </form>
        </div>
    </div>
    <!-- 遮罩层 -->
    <div class="mask"></div>
    <!-- 注册协议 -->
    <div class="protocol">
        <div class="protocol_title">注册协议</div>
        <div class="close"></div>
        <div class="protocol_content">
            欢迎您进入“网贷大院”，“网贷大院”（www.wangdaidayuan.com，以下简称“本网站”）由杭州大院数据科技有限公司（以下简称“本公司”）负责运营。请您在注册成为网贷大院用户前仔细阅读本服务协议内容，本服务协议具有合同法律效力，您在网贷大院的一切会员活动和使用行为都需遵从本使用条款。
            <p class="deal_title">一、协议内容及签署</p>
            <p class="deal_text"> 1.1. 本协议内容包括协议正文及所有网贷大院已经发布的或将来可能发布的各类规则。所有规则为本协议不可分割的组成部分，与协议正文具有同等法律效力。 </p>
            <p class="deal_text">1.2. 您应当在使用本网站服务前认真阅读全部协议内容并确保完全理解协议内容，如您对协议有任何疑问，应向本公司咨询。无论您事实上是否已认真阅读本协议内容，只要您完成注册、正在或者继续使用本网站服务，即视为您接受本协议及各类规则，并同意受其约束。</p>
            <p class="deal_text">1.3. 您承诺接受并遵守本协议的约定。如果您不同意本协议的约定，您应立即停止注册程序或停止使用本网站服务。</p>
            <p class="deal_text">1.4. 本公司有权根据需要随时制订、修改本协议及各类规则，只以网站公示的方式进行公告，毋须另行通知用户。变更后的协议和规则一经在网站公布后，立即自动生效。您可随时登录网页查阅最新版本的协议。如您不同意相关变更，应当立即停止使用本网站服务。您继续使用服务的，即表示您接受经修订的协议和规则。</p>
            <p class="deal_title">二、用户及账户管理</p>
            <p class="deal_text">2.1. 账户 您在申请使用本网站的服务时，您应保护您的账户和密码的安全，并对通过您的账户和密码实施的行为负责。账户和密码不得以任何方式转让。如果发现任何人不当使用您的账户或有任何其他可能危及您的账户安全的情形时，您应当立即以有效方式通知本公司，并要求本公司暂停相关服务。您应理解本公司对您的请求采取行动需要合理时间，因此对在采取行动前已经产生的后果（包括但不限于您的任何损失）不承担任何责任，但本公司未能在合理时间内采取行动的情况除外。您认可您在注册、使用网贷大院服务过程中提供、形成的数据(包括但不限于您在网贷大院的合作机构发生交易行为所产生的数据)等相关信息的所有权及其他相关权利属于网贷大院，网贷大院有权使用上述信息。</p>
            <p class="deal_text">2.2. 用户 在您按照注册页面提示填写信息、阅读并同意本协议并完成全部注册程序后，您即成为网贷大院用户（亦称用户）。在注册使用本网站服务时，用户应当按照法律法规的要求，或根据本网站的提示，提供自己的真实信息，并保证向本网站提供的各种信息和资料是真实、准确、完整、有效和合法的。如用户向本网站提供的各项信息和资料发生变更，用户应当及时在本网站，如因用户未及时更新信息和资料导致本网站无法向用户提供服务或发生错误，由此产生的法律责任和后果由用户自己承担。如使用他人信息和资料注册使用本网站服务，由此引起的一切责任和后果均由用户本人全部承担，本公司及本网站不因此承担任何法律责任，如因此而给本公司及本网站造成损失，用户应当承担赔偿本公司及本网站损失的责任。您在使用网贷大院服务过程中，所产生的应纳税费，以及一切硬件、软件、服务、账户维持及其它方面的费用，均由您独自承担。您同意网贷大院有权从您相关账户中优先扣除上述费用。</p>
            <p class="deal_title">三、法律法规 用户在使用网贷大院的过程中，必须遵循以下原则：</p>
            <p class="deal_text">• 遵守中国有关的法律和法规；</p>
            <p class="deal_text">• 遵守所有与“网贷大院”有关的协议、规定和程序；</p>
            <p class="deal_text">• 不得利用“网贷大院”进行从事任何违法违规活动；</p>
            <p class="deal_text">• 不得利用“网贷大院”进行任何不利于网贷大院的行为；</p>
            <p class="deal_text">• 如发现任何非法使用您的账户或账户出现安全漏洞的情况，应立即通知网贷大院。 若用户违反上述规定，所产生的一切法律责任和后果与本公司和本网站无关，由用户自行承担，如因此给本公司和本网站造成损失的，由用户赔偿本公司和本网站的损失。同时，网贷大院或其授权的人有权要求您改正或直接采取一切必要的措施（包括但不限于更改或删除您发布的内容等、暂停或终止您使用“网贷大院”的权利）以减轻您不当行为造成的影响。</p>
            <p class="deal_title">四、责任范围和责任限制</p>
            <p class="deal_text">4.1. 网贷大院所发布的产品信息仅供参考，网贷大院尽力严谨处理本网站所载资料，但并不就其准确性作出保证。网贷大院不对数据的错误或遗漏承担责任。</p>
            <p class="deal_text">4.2. 用户对于本网站披露的信息、选择使用本网站提供的服务等，应当自行判断真实性和承担风险，由此而产生的法律责任和后果由用户自己承担，本公司不承担任何责任。</p>
            <p class="deal_text">4.3. 与本公司合作的第三方机构向用户提供的服务由第三方机构自行负责，本公司不对此等服务承担任何责任。</p>
            <p class="deal_text">4.4. 本网站的内容可能涉及第三方所有的信息或第三方网站，该等信息或第三方网站的真实性、可靠性、有效性等由相关第三方负责，用户对该等信息或第三方网站自行判断并承担风险，与本网站和本公司无关。</p>
            <p class="deal_text">4.5. 本网站提供的服务中不含有任何第三方网站的真实性、准确性、可靠性、有效性、完整性等的任何保证和承诺，用户需根据自身风险承受能力，衡量本网站披露的交易内容及交易对方的真实性、可靠性、有效性、完整性，用户因其选择使用本网站提供的服务、参与的交易等而产生的直接或间接损失均由用户自己承担，包括但不限于资金损失、利润损失、营业中断等。</p>
            <p class="deal_text">4.6. 因使用本网站服务而引起的任何损害或经济损失，网贷大院承担的全部责任均不超过向用户收取的服务费用总额。本责任限制条款在会员资格被冻结、暂停或注销后仍继续有效。</p>
            <p class="deal_text">4.7. 不论在何种情况下，网贷大院均不对由于罢工、暴乱、起义、骚乱、火灾、洪水、风暴、爆炸、战争、政府行为、司法行政机关的命令，以及其它非网贷大院的原因而造成的中断服务、延迟服务或终止服务承担责任。网贷大院会尽合理努力处理善后事宜。</p>
            <p class="deal_title">五、信息披露</p>
            <p class="deal_text">5.1. 用户在此同意，对于用户提供给本公司和本网站服务所需而自行收集的用户个人信息和资料，本公司有权按照本服务协议的约定进行使用或者披露。</p>
            <p class="deal_text">5.2. 用户授权本公司基于履行有关协议、解决争议、调停纠纷、保障本网站用户交易安全等目的使用用户的个人资料（包括但不限于用户自行提供的以及本公司信审行为所获取的其他资料）。本公司有权调查多个用户以识别问题或解决争议，特别是本公司可审查用户的资料以区分使用多个用户名或别名的用户。</p>
            <p class="deal_text">5.3. 为避免用户通过本网站从事欺诈、非法或其他刑事犯罪活动，保护本网站及其正常用户合法权益，用户授权本公司可通过人工或自动程序对用户的个人资料进行评价和衡量。</p>
            <p class="deal_text">5.4. 用户同意本公司可以使用用户的个人资料以改进本网站的推广和促销工作、分析网站的使用率、改善本网站的内容和产品推广形式，并使本网站内容、设计和服务更能符合用户的要求。这些使用能改善本网站的网页，以调整本网站网页使其更能符合用户的需求，从而使用户在使用本网站服务时得到更为顺利、有效、安全及度身订造的交易体验。</p>
            <p class="deal_text">5.5. 用户在此同意允许本公司通过在本网站的某些网页上使用诸如“Cookies”的设置收集用户信息并进行分析研究，以为用户提供更好的量身服务。</p>
            <p class="deal_text">5.6. 本公司有义务根据有关法律、法规、规章及其他政府规范性文件的要求向司法机关和政府部门提供用户的个人资料及交易信息。</p>
            <p class="deal_text">5.7. 本公司采用行业标准惯例以保护用户的个人信息和资料，鉴于技术限制，本公司不能确保用户的全部私人通讯及其他个人资料不会通过本条款中未列明的途径泄露出去。</p>
            <p class="deal_title">六、内容所有权</p>
            <p class="deal_text">6.1. 本网站中的所有内容均属于本公司所有,包括但不限于文本、数据、文章、设计、源代码、软件、图片、照片、音频、视频及其他全部信息。本网站内容受中国知识产权法律法规及各国际版权公约的保护。</p>
            <p class="deal_text">6.2. 未经相关权利人事先书面同意,上述资料均不得在任何媒体直接或间接发布、播放、出于播放或发布目的而改写或再发行，或者被用于其他任何商业目的。所有这些资料或资料的任何部分仅可作为私人和非商业用途而保存在某台计算机内。任何未经授权对本网站内容的使用均属于违法行为,本公司有权追究用户的法律责任。</p>
            <p class="deal_text">6.3. 用户承诺不以任何形式复制、模仿、传播、出版、公布、展示本网站内容,包括但不限于电子的、机械的、复印的、录音录像的方式和形式等。用户承认本网站内容是属于本公司的财产。</p>
            <p class="deal_title">七、违约赔偿</p>
            <p class="deal_text"> 您同意保障和维护网贷大院及其他用户的利益，如因您违反有关法律、法规或本协议项下的任何条款而给网贷大院或任何其他第三人造成损失，您同意承担由此造成的损害赔偿责任。</p>
            <p class="deal_title">八、法律管辖</p>
            <p class="deal_text">8.1. 本协议之效力、解释、变更、执行与争议解决均适用中华人民共和国法律，如无相关法律规定的，则应参照通用国际商业惯例和（或）行业惯例。</p>
            <p class="deal_text">8.2. 因本协议产生之争议，应依照中华人民共和国法律予以处理。双方对于争议协商不成的，任何一方有权将纠纷提交至本公司所在地有管辖权的人民法院诉讼解决。</p>
            <p class="deal_title">九、其他条款</p>
            <p class="deal_text">9.1. 本服务协议自您同意勾选并成功注册为本网站用户之日起生效，除非本网站终止本服务协议或者用户丧失本网站用户资格，否则本服务协议始终有效。</p>
            <p class="deal_text">9.2. 本公司对于用户的违约行为放弃行使本服务协议规定的权利的，不得视为其对用户的其他违约行为放弃主张本服务协议项下的权利。本服务协议终止并不免除用户根据本服务协议或其他有关协议、规则所应承担的义务和责任。</p>
            <p class="deal_text">9.3. 本服务协议和规则及不时修订条款具有可分割性，任一条款被视为违法、无效、被撤销、变更或因任何理由不可执行，并不影响其他条款的合法性、有效性和可执行性。</p>
            <p class="deal_text">9.4. 本条款的修改权和最终解释权归本公司所有。</p>
        </div>
    </div>
</div>

<script src="{{ URL::asset(Config::get('myconfig.oss_url')) }}js/jquery.min.js"></script>
<script>
    function yzmfresh(elem) {
        var src = $(elem).find('img');
        var http = src.attr('src').split('?')[0];
        src.attr('src', http + '?' + Math.random());
    }
    $(".headerTop_right li a").removeClass("border01");

    // 注册协议
    $(".close").click(function () {
        $(".mask").hide();
        $(".protocol").hide();
    });

    $(".to_protocol").click(function () {
        $(".mask").show();
        $(".protocol").show();
    });

    // 发送验证码
    $(".get_code").click(function () {
        // 判断手机号是否为空，不为空才能发送验证码
        if ($(".phone_inp").val() !== "" && /^(13|15|18|14|17)[0-9]{9}$/.test($(".phone_inp").val())) {
            $.ajax({
                type: "post",
                url: "/sms/send",
                dataType: "json",
                data: {
                    mobile: $(".phone_inp").val(),
                    _token: '{{ csrf_token() }}',
                },
                success: function (data) {
                    downTime();
                    $(".error_02").text(data.rtndata);
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {}
            });
        } else {
            $(".error_01").text("请输入11位手机号！");
            $(".phone_inp").focus(function () {
                $(".error_01").text("");
            })
        }
    })

    // 重新获取验证码
    function downTime() {
        var at = 60;
        var MyTime = setInterval(function () {
            if (at > 0) {
                at--;
                $(".get_code").html("重新获取(" + at + ")").attr("disabled", "disabled");
            } else if (at == 0) {
                $(".get_code").html("重获验证码").removeAttr("disabled");
                clearInterval(MyTime);
            }
        }, 1000);
    }

    // 用户注册协议判断
    $("input[type='checkbox']").click(function () {
        var check = $("input[type='checkbox']").is(':checked');
        if (check === true) {
            $(".error_05").text("");
        }
    });

    // 手机号是否注册验证
    $(".phone_inp").blur(function () {
        $.ajax({
            type: "get",
            url: "/phone_check",
            dataType: "json",
            data: {
                mobile: $(".phone_inp").val(),
                _token: '{{ csrf_token() }}',
            },
            success: function (data) {
                if ($(".phone_inp").val() !== "") {
                    // 判断是否注册，若注册不允许发验证码
                    if (data.errorno !== 0) {
                        $(".error_01").text(data.rtndata); // 显示重复注册
                        $(".get_code").attr("disabled", "disabled"); // 禁止发送验证码
                        $(".phone_inp").focus(function () {
                            $(".error_01").text("");
                        })
                    } else {
                        $(".get_code").removeAttr("disabled", "disabled");
                    }
                }
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {}
        })
    });

    // 注册提交
    $(".register_btn").click(function () {
        // 输入时取消错误提示
        $("input").focus(function () {
            $(this).siblings("p").text("");
        });
        // 判断用户名是否为空
        if ($(".phone_inp").val() === "") {
            $(".error_01").text("请输入手机号！");
            return false;
        }
        // 判断手机格式
        else if (!/^(13|15|18|14|17)[0-9]{9}$/.test($(".phone_inp").val()) && $(".phone_inp").val().length <
            11) {
            $(".error_01").text("手机号码格式不正确！");
            return false;
        }
        // 判断验证码是否为空
        else if ($(".code_inp").val() === "") {
            $(".error_02").text("验证码不能为空！");
            return false;
        }
        // 判断图形验证码是否为空
        else if ($(".img_inp").val() === "") {
            $(".error_03").text("图片验证码不能为空！");
            return false;
        }
        // 判断密码是否为空或者小于6位
        else if ($(".pwd_inp").val() === "" || $(".pwd_inp").val().length < 6) {
            $(".error_04").text("请输入至少6位密码");
            return false;
        }
        // 判断是否确认密码
        else if ($(".pwdAgain_inp").val() === "") {
            $(".error_05").text("请确认新密码！");
            return false;
        }
        // 判断两次密码是否一致
        else if ($(".pwd_inp").val() !== $(".pwdAgain_inp").val() || $(".pwdAgain_inp").val().length < 6) {
            $(".error_05").text("两次密码不一致！");
            return false;
        }
        // 未同意注册协议
        else if ($("input[type='checkbox']").prop("checked") === false) {
            $(".error_05").text("请先阅读并同意用户协议！");
            return false;
        }
        $.ajax({
            type: "post",
            url: "/register",
            dataType: "json",
            data: {
                mobile: $(".phone_inp").val(),
                _token: '{{ csrf_token() }}',
                password: $(".pwd_inp").val(),
                verifyCode: $(".code_inp").val(),
                captcha1: $(".img_inp").val(),
                inviteCode: $(".invite_code").val(),
            },
            success: function (data) {
                if (data.errorno === 0) {
                    console.log(data)
                    window.location.href = "/" // 注册成功后跳转到首页
                } else if (data.errorno === -1) {
                    console.log(data);
                    $(".error_02").text(data.rtndata.mobile);
                    $(".error_02").text(data.rtndata.verifyCode); //短信验证码错误提示
                    $(".error_03").text(data.rtndata.captcha1); // 图片验证码错误提示
                    $(".error_04").text(data.rtndata.password); //密码错误提示
                    yzmfresh($(".img_code>a")); // 重新获取图片验证码
                    $(".img_inp").val(""); // 清空图形验证码
                } else {
                    $(".error_05").text(data.rtndata); // 处理错误信息
                }
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {}
        });
    });
</script>

@endsection