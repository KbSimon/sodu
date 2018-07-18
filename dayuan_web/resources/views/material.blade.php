@extends('layouts.app')
@section('title', '账号设置') 
@section('content')
<link rel="stylesheet" href="{{ URL::asset(Config::get('myconfig.oss_url')) }}css/base.css">
<link rel="stylesheet" href="{{ URL::asset(Config::get('myconfig.oss_url')) }}css/accountNew.css">

<body>
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
                    <li>
                        <a href="/account">账户总览</a>
                    </li>
                    <li>
                        <a href="/account/rebate">返利记录</a>
                    </li>
                    <li>
                        <a href="/account/money">邀请好友</a>
                    </li>
                    <li class="active">
                        <a href="/account/info">账号设置</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- 右侧 -->
        <div class="set_right">
            <p>账号设置</p>
            <table class="set_table">
                <tbody>
                    <tr>
                        <td>绑定手机号码</td>
                        <td>手机号码可用于登录</td>
                        <td>{{Session::get('user.mobile', 0)}}</td>
                        <td>已绑定</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>绑定银行卡</td>
                        <td>填写银行卡账号，用户返现</td>
                        <td>
                            @if($bankinfo==null)
                            @elseif(($bankinfo!==null))
                            {{$bankinfo->userBankNumber}}
                            @else
                            @endif
                        </td>
                        @if($bankinfo->userBankNumber==null)
                        <td class="to_bound" style="color: #333;text-decoration: underline">去绑定</td>
                        @elseif(($bankinfo->userBankNumber!==null))
                        <td>已绑定</td>
                        <td class="to_update">修改</td>
                        @else
                        @endif
      
                    </tr>
                    <tr>
                        <td>登录密码</td>
                        <td>为保障账户安全，请妥善保管好您的登录密码</td>
                        <td>*******</td>
                        <td>已设置</td>
                        <td class="update_password">修改</td>
                    </tr>
                </tbody>
            </table>
            <p class="hint">温馨提示：网络有风险，保护好自身的个人信息，切勿泄露！</p>
        </div>
    </div>
    <!-- 遮罩层 -->
    <div class="mask" ></div>
    <!-- 绑定银行卡 -->
    <div class="bound_card">
        <div class="close"></div>
        <p class="card_title">绑定银行卡</p>
        <form>
            <ul class="card_ul">
                <li>
                    <label>银行：</label>
                    <select class="card_input" id="bank">
                        <option value="">请选择银行</option>
                        @foreach($banklist as $banklist)
                        <option value="{{$banklist->bankAcronym}}">{{$banklist->bankName}}</option>
                        @endforeach
                    </select>
                    <p class="error_01"></p>
                </li>
                <li>
                    <label>姓名：</label>
                    <input type="text" class="name_input" placeholder="填写绑卡人真实姓名">
                    <p class="error_02"></p>
                </li>
                <li>
                    <label>银行卡号：</label>
                    <input type="text" class="cardNum_input" placeholder="填写正确的银行卡号" minlength="19" maxlength="23">
                    <p class="error_03"></p>
                </li>
                <li>
                    <label>开户地址：</label>
                    <select class="state_input" id="cmbProvince" name="cmbProvince"></select>
                    <select class="city_input" id="cmbCity" name="cmbCity"></select>
                    <select id="cmbArea" name="cmbArea" style="display:none"></select>  
                    <p class="error_04"></p>
                </li>
                <li>
                    <label>开户行支行：</label>
                    <input type="text" class="allName_input" placeholder="请填写开户行支行（返利到账更快哦）">
                    <p class="error_05"></p>
                </li>
            </ul>
            <input type="button" class="card_btn" id="update_btn" value="保存">
        </form>
    </div>
  
    <!-- 修改密码 -->
    <div class="password_window">
        <div class="close"></div>
        <p class="password_title">修改密码</p>
        <form action="">
            <ul class="password_ul">
                <li>
                    <label>旧密码：</label>
                    <input type="password" class="old_password" placeholder="请输入旧密码">
                    <p class="error_06"></p>
                </li>
                <li>
                    <label>新密码：</label>
                    <input type="password" class="new_password" placeholder="请输入新登录密码（6-16位数字和字母）">
                    <p class="error_07"></p>
                </li>
                <li>
                    <label>再次输入：</label>
                    <input type="password" class="new_pwdAgain" placeholder="请再次输入登录密码">
                    <p class="error_08"></p>
                </li>
            </ul>
        </form>
        <button type="button" class="password_btn">保存</button>
    </div>

<script src="{{ URL::asset(Config::get('myconfig.oss_url')) }}/js/jquery.min.js"></script>
<script src="{{ URL::asset(Config::get('myconfig.oss_url')) }}/js/jsAddress.js"></script>
<script>
     addressInit('cmbProvince', 'cmbCity', 'cmbArea'); 
     $(".headerTop_right li a").removeClass("border01");

     // 取消错误提示
     $("input,select").focus(function () {
        $(this).siblings("p").text("");
    });

    // 关闭弹窗
    $(".close").click(function () {
    $(".mask").hide();
    $('form')[0].reset();
    $('form')[1].reset();
    $(".bound_card").hide();
    $(".update_card").hide();
    $(".password_window").hide();
    $("input,select").siblings("p").text("");
    });
    
   
    
    // 去绑卡
    $(".to_bound").click(function () {

        $(".mask").show();
        $(".bound_card").show();
        $("input,select").siblings("p").text("");
        $(".card_title").text("绑定银行卡");
        $(".card_btn").click(function(){
            // 验证银行
            if($(".card_input").val() == $(".card_input option:eq(0)").val() ){
                $(".error_01").text("请选择银行");
                return false;
            }
            // 验证姓名
            else if($(".name_input").val() == ""){
                $(".error_02").text("请填写绑卡人真实姓名");
                return false;
            }
            // 验证银行卡号
            else if($(".cardNum_input").val() == "" || $(".cardNum_input").val().length < 19){
                $(".error_03").text("请填写正确的银行卡号");
            }
            // 开户地址
            else if($(".state_input").val() == $(".state_input option:eq(0)").val() ){
                $(".error_04").text("请选择开户地址");
                return false;
            }
            // 开户行全称
            else if($(".allName_input").val() == ""){
                $(".error_05").text("请填写开户行支行名称");
                return false;
            }
            var card = $(".cardNum_input").val();
            var num = card.replace(/\s/g, "")
            $.ajax({
            type: "post",
            url: "/account/bankadd",
            dataType: "json",
            data: {
                bank: $(".card_input").find("option:selected").text(),
                Acronym: $("#bank").val(),
                userName: $(".name_input").val(),
                _token: '{{ csrf_token() }}',
                cardNo: num,
                province: $(".state_input").val(),
                city: $(".city_input").val(),
                area: $(".allName_input").val(),
                userId: 4561,
            },
            success: function (data) {
                console.log(data);
                if(data.errorno == 0){
                    console.log(data);
                    $('form')[0].reset(); // 清空表单数据
                    $(".mask").hide();  //
                    $(".bound_card").hide();
                    alert("绑卡成功");
                    window.location.reload();
                }else{
                    $(".error_05").text(data.rtndata);
                }
             },
            error: function (XMLHttpRequest, textStatus, errorThrown) {}
            })
        })
    })
     
   
    // 修改银行卡
    $(".to_update").click(function () {
        $(".mask").show();
        $(".bound_card").show();
        $(".card_title").text("修改银行卡");
        $("input,select").siblings("p").text("");
        $(".card_btn").click(function(){
            // 验证银行
            if($(".card_input").val() == $(".card_input option:eq(0)").val() ){
                $(".error_01").text("请选择银行");
                return false;
            }
            // 验证姓名
            else if($(".name_input").val() == ""){
                $(".error_02").text("请填写绑卡人真实姓名");
                return false;
            }
            // 验证银行卡号
            else if($(".cardNum_input").val() == "" || $(".cardNum_input").val().length < 19){
                $(".error_03").text("请填写正确的银行卡号");
            }
            // 开户地址
            else if($(".state_input").val() == $(".state_input option:eq(0)").val() ){
                $(".error_04").text("请选择开户地址");
                return false;
            }
            // 开户行全称
            else if($(".allName_input").val() == ""){
                $(".error_05").text("请填写开户行全称或所在县区");
                return false;
            }
            var card = $(".cardNum_input").val();
            var num = card.replace(/\s/g, "")
            $.ajax({
            type: "post",
            url: "/account/bankadd",
            dataType: "json",
            data: {
                bank: $(".card_input").find("option:selected").text(),
                Acronym: $("#bank").val(),
                userName: $(".name_input").val(),
                _token: '{{ csrf_token() }}',
                cardNo: num,
                province: $(".state_input").val(),
                city: $(".city_input").val(),
                area: $(".allName_input").val(),
                userId: 4561,
            },
            success: function (data) {
                console.log(data);
                if(data.errorno == 0){
                    console.log(data);
                    $('form')[0].reset(); // 清空表单数据
                    $(".mask").hide();  //
                    $(".bound_card").hide();
                    alert("修改成功");
                }else{
                    $(".error_05").text(data.rtndata);
                }
             },
            error: function (XMLHttpRequest, textStatus, errorThrown) {}
            })
        })
    })  

    // 修改密码
    $(".update_password").click(function(){
        $(".mask").show();
        $(".password_window").show();
        $("input,select").siblings("p").text("");
        $(".password_btn").click(function(){
        // 判断旧密码是否为空
        if ($(".old_password").val() === "") {
            $(".error_06").text("请输入旧密码");
            return false;
        }
        // 判断旧密码的长度
        else if($(".old_password").val().length <6){
            $(".error_06").text("旧密码的长度小于6位");
            return false;
        }
        // 判断新旧密码是否一致
        else if($(".old_password").val() === $(".new_password").val()){
            $(".error_07").text("新密码不能和旧密码一致");
            return false;
        }
        // 判断新密码是否为空
        else if ($(".new_password").val() === "") {
            $(".error_07").text("请输入新密码");
            return false;
        }
        // 判断新密码的长度
        else if($(".new_password").val().length <6){
            $(".error_07").text("新密码的长度小于6位");
            return false;
        }
        // 判新确认密码是否为空
        else if ($(".new_pwdAgain").val() === "") {
            $(".error_08").text("请确认新密码");
            return false;
        }
        // 判断新密码的长度
        else if($(".new_pwdAgain").val().length <6){
            $(".error_08").text("新密码的长度小于6位");
            return false;
        }
        else if ($(".new_password").val() != $(".new_pwdAgain").val()){
            $(".error_08").text("两次密码不一致");
            return false;
        }
        $.ajax({
            type: "post",
            url: "/account/passedit",
            dataType: "json",
            data: {
                _token: '{{ csrf_token() }}',
                old_password: $(".old_password").val(),
                new_password: $(".new_password").val(),
                new_pwdAgain: $(".new_pwdAgain").val(),
            },
            success: function (data) {
                if(data.errorno === 0){
                    console.log(data)
                    $('form')[1].reset(); // 清空表单数据
                    $(".mask").hide();  //
                    $(".password_window").hide();
                    alert("修改密码成功！");
                   
                }else{
                    $('.error_08').text(data.rtndata); // 处理登录失败错误信息
                    $("input").focus(function(){
                        $('.error_08').text(""); 
                    })
                }
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {}
            });
        })
    })

    // 银行卡号校验
    $(".cardNum_input").on("input", function () {
        var val = $(this).val().replace(/\s/g, "").replace(/(\d{4})/g, "$1 ");
        $(this).val(val);
    });

    $(".cardNum_input").on("keyup", function () {
        //获取当前光标的位置
        var caret = this.selectionStart;
        //获取当前的value
        var value = this.value;
        //从左边沿到坐标之间的空格数
        var sp = (value.slice(0, caret).match(/\s/g) || []).length;

        //去掉所有空格
        var nospace = value.replace(/\s/g, '');
        //重新插入空格
        var curVal = this.value = nospace.replace(/\D+/g, "").replace(/(\d{4})/g, "$1 ").trim();
        //从左边沿到原坐标之间的空格数
        var curSp = (curVal.slice(0, caret).match(/\s/g) || []).length;
        //修正光标位置
        this.selectionEnd = this.selectionStart = caret + curSp - sp;
    });

    // 修改密码
    
</script>
@endsection