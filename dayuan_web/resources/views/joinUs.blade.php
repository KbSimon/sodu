@extends('layouts.app')
@section('title', '加入我们') 
@section('content')
<link rel="stylesheet" href="{{ URL::asset(Config::get('myconfig.oss_url')) }}css/joinUs.css">

<div class="joinUs">
    <div class="banner"></div>
    <div class="joinUs_content">
        <div class="joinUs_headline">
            <h3>我们期待你的加入</h3>
            <p>网贷大院-数据共享，院与同行，为什么加入我们？因为梦想在这里起航！</p>
        </div>
        <ul class="boon_ul"></ul>
        <ul class="jobs clearfloat">
            <li>产品经理</li>
            <li>内容编辑</li>
            <li>客服专员</li>
            <li>电销专员</li>
        </ul>
        <div class="jobs_content">
            <ul class="jobs_ul clearfloat">
                <li>
                    <h4>产品经理</h4>
                    <h6>Product manager</h6>
                    <h5>年限：2-3年</h5>
                    <p class="jobs_duty">岗位职责：</p>
                    <p>1、负责产品原型设计与优化，与各需求方对接整理相关需求；</p>
                    <p>2、能对用户行为、产品数据进行分析，并以此为依据驱动产品运营方案与计划；</p>
                    <p>3、相应的文档编写及整理</p>
                    <p class="jobs_need">任职要求</p>
                    <p>1、1~2年的APP及pc端相关产品经理工作经验，有互联网金融产品经验者优先；</p>
                    <p>2、熟练使用产品设计工具Axure，Xmind等；</p>
                    <p>3、具有较强的沟通能力和团队协作意识，能和研发团队、运营团队进行圆滑且有效率的沟通合作。</p>
                </li>
                <li>
                    <h4>内容编辑/新媒体运营</h4>
                    <h6>Content editing</h6>
                    <h5>年限：1-3年</h5>
                    <p class="jobs_duty">岗位职责：</p>
                    <p>1、负责新媒体及网站撰写、运营、维护，提高品牌影响力和关注度；</p>
                    <p>2、熟悉公司各项推广产品、活动策划，结合公司项目、活动及热点等撰写方案；</p>
                    <p>3、跟踪推送内容效果、掌握粉丝心理，整理分析数据并反馈上级。</p>
                    <p class="jobs_need">任职要求</p>
                    <p>1、本科及以上学历；</p>
                    <p>2、有良好的文字写作编辑能力；</p>
                    <p>3、有互联网金融行业工作经验优先，善于发掘投资人需求；</p>
                    <p>4、有新媒体编辑经验。</p>
                </li>
                <li>
                    <h4>客服专员</h4>
                    <h6>Customer service</h6>
                    <h5>年限：不限</h5>
                    <p class="jobs_duty">岗位职责：</p>
                    <p>1、通过400服务热线、营销QQ等多种途径处理用户问题、投诉等反馈信息；</p>
                    <p>2、对官网注册用户及400咨询用户进行回访，提高用户转化率；</p>
                    <p>3、了解行业的产品和服务，不断改进和提升服务水平；</p>
                    <p class="jobs_need">任职要求</p>
                    <p>1、有客服经验、呼叫中心工作经验优先，有网络销售或电话销售经验者优先；</p>
                    <p>2、普通话标准，口齿伶俐，懂得投资者心理，语言表达能力强，擅于沟通;</p>
                    <p>3、头脑清晰，思维敏捷，有良好的销售服务意识，工作耐心细致;</p>
                    <p>4、薪酬：底薪+高额提成+高额绩效奖金+五险一金</p>
                </li>
                <li>
                    <h4>电销专员</h4>
                    <h6>Telemarketing</h6>
                    <h5>年限：1-3年</h5>
                    <p class="jobs_duty">岗位职责：</p>
                    <p>1、通过电话、网络等方式开发新客户，根据公司要求完成销售目标；</p>
                    <p>2、团结协作，发掘潜在客户，把握客户需求;</p>
                    <p class="jobs_need">任职要求</p>
                    <p>1、有电话销售经验者优先；学习能力强，有较强的抗压能力和执行力，敢于承担责任，有良好的职业操守；</p>
                    <p>2、普通话标准，口齿伶俐，具有一定的亲和力，有一定的资源整合能力以及销售技巧；</p>
                    <p>3、有客户储备、保险销售、互联网金融电销经验的优先。</p>
                    <p>4、有较强的客情维护能力；</p>
                </li>
            </ul>
            <p class="email">请将简历投递至：
                <span>hr@wangdaidayuan.com</span>
            </p>
        </div>
    </div>
</div>
<script src="{{ URL::asset(Config::get('myconfig.oss_url')) }}js/jquery.min.js"></script>
<script>
    $(".headerTop_right li a").removeClass("border01");
</script>
@endsection
