<?php /*a:2:{s:50:"D:\www\larray\team\basetp6\view\layouts\error.html";i:1587801394;s:51:"D:\www\larray\team\basetp6\view\\layouts\admin.html";i:1586338218;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title><?php echo htmlentities((isset($title) && ($title !== '')?$title:'后台模板')); ?></title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="/static/admin/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="/static/admin/css/common.css" media="all">
    <!--[if lt IE 9]>
    <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
    <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
     
</head>

<body>
    
<div class="layadmin-tips">
    <i class="layui-icon" face>&#xe664;</i>
    <div class="layui-text">
        <h1>
            <span class="layui-anim layui-anim-loop layui-anim-">4</span>
            <span class="layui-anim layui-anim-loop layui-anim-rotate">0</span>
            <span class="layui-anim layui-anim-loop layui-anim-">4</span>
        </h1>
    </div>
</div>

    <div class="layui-fluid">
        <div class="layui-card">
            <div class="layui-card-body">
                
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