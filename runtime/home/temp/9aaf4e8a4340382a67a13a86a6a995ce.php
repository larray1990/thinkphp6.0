<?php /*a:2:{s:55:"D:\www\larray\team\basetp6\view\home\product\index.html";i:1590398866;s:57:"D:\www\larray\team\basetp6\view\home\..\layouts\home.html";i:1590399572;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo htmlentities((isset($title) && ($title !== '')?$title:'前台页面')); ?></title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="/static/admin/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="/static/admin/css/common.css" media="all">
    <link rel="stylesheet" href="/static/admin/css/home.css" media="all">
    <!--[if lt IE 9]>
    <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
    <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
     
</head>
<body class="layui-layout-body">
    <div class="layui-layout layui-layout-admin">
      <div class="layui-header">
        <ul class="layui-nav layui-bg-blue">
            <li class="layui-nav-item layui-col-md-offset2 layui-this"><a href="<?php echo url('index/index'); ?>">首页</a></li>
            <li class="layui-nav-item"><a href="">大数据</a></li>
            <li class="layui-nav-item">
                <a href="javascript:;">产品</a>
                <dl class="layui-nav-child">
                    <dd><a href="<?php echo url('product/index'); ?>">选项1</a></dd>
                    <dd><a href="">选项2</a></dd>
                    <dd><a href="">选项3</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item">
                <a href="javascript:;">解决方案</a>
                <dl class="layui-nav-child">
                    <dd><a href="">移动模块</a></dd>
                    <dd><a href="">后台模版</a></dd>
                    <dd class="layui-this"><a href="">选中项</a></dd>
                    <dd><a href="">电商平台</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item"><a href="">社区</a></li>
        </ul>
      </div>
      
      <div class="layui-body">
        <!-- 内容主体区域 -->
        
<div style="padding: 15px;">
    内容主体区域
    <br><br>
    <blockquote class="layui-elem-quote">
      注意：
    </blockquote>
    
    <blockquote class="layui-elem-quote">
      layui 之所以赢得如此多人的青睐，更多是在于它“前后台系统通吃”的能力。
      <br>既可编织出绚丽的前台页面，又可满足繁杂的后台功能需求。
      <br>layui 后台布局，
    </blockquote>
  
  </div>


        <div class="layui-footer">
            <!-- 底部固定区域 -->
            © layui.com - 底部固定区域
        </div>
      </div>
    
    </div>
    <script type="text/javascript" src="/static/admin/layui/layui.js"></script>
    <script>
        layui.config({
            base: "/static/admin/plugs/",
        }).extend({ //设定组件别名 //主入口模块(名字同样根据自己的结构改动)
            common: 'js/common',
            index: 'js/index',
            echarts: 'echarts/echarts',
            echartsTheme: 'echarts/echartsTheme',
            tinymceTextarea: 'tinymce/tinymceTextarea',
            layarea: 'select/layarea',
            iconPicker: 'iconPicker/iconPicker',
        }).use(['common', 'index', 'echarts', 'echartsTheme', 'tinymceTextarea', 'layarea','iconPicker']);
    </script>
    
</body>
</html>