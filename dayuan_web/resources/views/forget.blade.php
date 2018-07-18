@extends('layouts.app') 
@section('title', '忘记密码') 
@section('content')
<link rel="stylesheet" href="{{ URL::asset(Config::get('myconfig.oss_url')) }}css/register.css">
<div class="register clearfloat">
    <div class="states">
        <div class="register_right" id="forget">
            <div class="register_right_top">
                <p>忘记密码</p>
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
                    <input type="text" class="code_inp" placeholder="请输入验证码" required>
                    <button class="get_code" type="button">获取验证码</button>
                    <p class="error_02"></p>
                </div>
                <div class="img_code">
                    <input type="text" class="img_inp" placeholder="请输入图片验证码" required>
                    <a href="javascript:void(0)" onclick="yzmfresh(this);">{!! captcha_img() !!}</a>
                    <p class="error_03"></p>
                </div>
                <button type="button" class="forget_btn">确认</button>
            </form>
        </div>
    </div>

    <div class="mask"></div>

    <div class="approve">
        <!-- 未实名认证 -->
        <div class="close"></div>
        <p>密码修改成功</p>
        <a class="to_index" href="/">去首页</a>
        <a class="to_login" href="/login">去登录</a>
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

    // 关闭弹窗
    $(".close").click(function () {
        $(".mask").hide();
        $(".card").hide();
        $(".approve").hide();
    })

    // 未认证
    function noApprove() {
        $(".mask").show();
        $(".approve").show();
    }

    // 发送验证码
    $(".get_code").click(function () {
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
            $(".error_01").text("请输入手机号！");
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
                    // 判断是否注册，若未注册不允许发验证码
                    if (data.errorno === 0) {
                        $(".error_01").text("手机号未注册"); // 显示重复注册
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
    $(".forget_btn").click(function () {
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
        else if (!/^(13|15|18|14|17)[0-9]{9}$/.test($(".phone_inp").val()) && $(".phone_inp").val().length < 11) {
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
            url: "/passreset",
            dataType: "json",
            data: {
                mobile: $(".phone_inp").val(),
                _token: '{{ csrf_token() }}',
                password: $(".pwd_inp").val(),
                verifyCode: $(".code_inp").val(),
                captcha1: $(".img_inp").val(),
                type: 2,
            },
            success: function (data) {
                if (data.errorno === 0) {
                    console.log(data);
                    noApprove()
                    // window.location.href = "/login" // 注册成功后跳转到首页
                } else if (data.errorno === -1) {
                    console.log(data);
                    $(".error_01").text(data.rtndata.mobile);
                    $(".error_02").text(data.rtndata.verifyCode); //短信验证码错误提示
                    $(".error_03").text(data.rtndata.captcha1); // 图片验证码错误提示
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