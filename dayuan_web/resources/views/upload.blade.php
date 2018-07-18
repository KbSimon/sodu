<!DOCTYPE HTML>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <title>ueditor demo</title>
    @include('ueditor::head')
</head>

<body>
    <div id="main" style="width: 960px;margin-left: auto;margin-right: auto;">
        <form action="doupload" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div style="">
                <label for="">文章标题</label>
                <input type="text" name="title" style="margin: 10px;height: 30px;">
            </div>
            <div>
                <label for="">作者</label>
                <input type="text" name="author" style="margin: 10px;height: 30px;">
            </div>
            <div>
                <label for="">类别</label>
                <select name="ntype" style="margin: 10px;height: 30px;">
                    <option value="0">未分类</option>
                    <option value="1">热点资讯</option>
                    <option value="2">行业新闻</option>
                    <option value="3">独家新闻</option>
                    <option value="4">政策</option>
                </select>
            </div>
            <div>
                <label>关键字</label>
                <input type="" name="keys" value="" style="margin: 10px;height: 30px;" />
            </div>
            <div>
                <label>新闻图片</label>
                <input type="file"  name="file"  id="file" style="margin: 10px;height: 30px;" />
            </div>
            <!-- 加载编辑器的容器 -->
            <script id="container" name="content" type="text/plain">
                这里写你的初始化内容
            </script>
            <button type="submit" class="am-btn am-btn-primary">add</button>
        </form>
    </div>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('container',{
            initialFrameWidth: 800,
            initialFrameHeight: 500
        });
            ue.ready(function() {
            ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');

        });
    </script>
</body>

</html>