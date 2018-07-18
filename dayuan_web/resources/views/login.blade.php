@extends('layouts.app') 
@section('title', '登录') 
@section('content')
<link rel="stylesheet" href="{{ URL::asset(Config::get('myconfig.oss_url')) }}css/login.css">
<div class="login clearfloat">
    <div class="states">
        <div class="login_right">
            <div class="login_right_top">
                <p>欢迎登录网贷大院</p>
            </div>
            <form>
                <div class="user">
                    <input type="text" class="user_inp" placeholder="请输入账号" required maxlength="11">
                    <p class="error_01"></p>
                </div>
                <div class="password">
                    <input type="password" class="pwd_inp" placeholder="请输入登录密码" required maxlength="16">
                    <p class="error_02"></p>
                </div>
                <!-- <div class="code">
                        <div class="code_icon"></div>
                        <input type="text" class="code_inp" placeholder="请输入验证码" required>
                        <button class="get_code">获取验证码</button>    
            </div> -->
                <div class="login_state clearfloat">
                    <div class="forget" onclick="window.location.href='/forget'">忘记密码？</div>
                </div>
                <button type="button" class="to_login">登录</button>
                <p class="to_register">还没有网贷大院账号？
                    <a href="/register">立即注册</a>
                </p>
            </form>
        </div>
    </div>
</div>
<script src="{{ URL::asset(Config::get('myconfig.oss_url')) }}js/jquery.min.js"></script>
<script>
    $(".headerTop_right li a").removeClass("border01");

    // 表单验证
    $(".to_login").click(function () {
        // 输入时取消错误提示
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
                if (data.errorno === 0) {
                    window.location.href = "/";
                } else {
                    $('.error_02').text(data.rtndata);
                }
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {}
        });
    });
</script>
@endsection