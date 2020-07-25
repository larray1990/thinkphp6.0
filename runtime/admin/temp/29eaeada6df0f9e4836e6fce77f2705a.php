<?php /*a:2:{s:54:"D:\www\larray\team\basetp6\view\admin\index\index.html";i:1586334063;s:59:"D:\www\larray\team\basetp6\view\admin\..\layouts\admin.html";i:1595390812;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title><?php echo htmlentities((isset($title) && ($title !== '')?$title:'后台管理平台')); ?></title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="/static/admin/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="/static/admin/css/common.css" media="all">
    <!--[if lt IE 9]>
    <script src="/static/admin/plugs/js/html5.min.js"></script>
    <script src="/static/admin/plugs/js/respond.min.js"></script>
    <![endif]-->
    
<style type="text/css" id="LAY_layadmin_theme"></style>

</head>

<body>
    
<div id="LAY_WRAP">
    <div id='LAY_app' class="layui-side layui-bg-black">
        <div class="layui-side-scroll">
            <div class="layui-logo" lay-href="">
                <img src="/static/admin/img/logo.png" alt="">
                <span>后台管理系统</span>
            </div>
            <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
            <ul class="layui-nav layui-nav-left layui-nav-tree" lay-filter="layui-nav-left">
                <?php foreach($ld_arr as $k=>$vo): ?>
                <li data-name="<?php echo htmlentities($vo['title']); ?>" class="layui-nav-item">
                    <a lay-href="<?php if($vo['name'] == 'javascript:;'): ?>javascript:;<?php else: ?><?php echo url($vo['name']); ?><?php endif; ?>" lay-tips="<?php echo htmlentities($vo['title']); ?>" lay-direction="2">
                        <i class="layui-icon <?php echo htmlentities($vo['icon']); ?>"></i>
                        <cite><?php echo htmlentities($vo['title']); ?></cite>
                    </a>
                    <?php if(!(empty($vo['child']) || (($vo['child'] instanceof \think\Collection || $vo['child'] instanceof \think\Paginator ) && $vo['child']->isEmpty()))): ?>
                    <dl class="layui-nav-child">
                        <?php foreach($vo['child'] as $k1=>$v1): ?>
                        <dd>
                            <a lay-href="<?php echo url($v1['name']); ?>">
                                <i class="layui-icon <?php echo htmlentities($v1['icon']); ?>"></i>
                                <cite><?php echo htmlentities($v1['title']); ?></cite>
                            </a>
                        </dd>
                        <?php endforeach; ?>
                    </dl>
                    <?php endif; ?>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <!--主体-->
    <div class="layui-body" id="LAY_app_body">
        <div class="layui-header">
            <!-- 头部区域 -->
            <ul class="layui-nav layui-layout-left" lay-filter="layadmin-layout-left">
                <li class="layui-nav-item layadmin-flexible" lay-unselect="">
                    <a href="javascript:;" layadmin-event="flexible" title="侧边伸缩">
                        <i class="layui-icon layui-icon-shrink-right" id="LAY_app_flexible"></i>
                    </a>
                </li>
                <li class="layui-nav-item layui-hide-xs" lay-unselect>
                    <a href="/" target="_blank" title="前台">
                        <i class="layui-icon layui-icon-website"></i>
                    </a>
                </li>
                <li class="layui-nav-item" lay-unselect="">
                    <a href="javascript:;" layadmin-event="refresh" title="刷新">
                        <i class="layui-icon layui-icon-refresh-3"></i>
                    </a>
                </li>
                <!--<li class="layui-nav-item layui-hide-xs" lay-unselect="">
                        <input type="text" placeholder="搜索..." autocomplete="off" class="layui-input layui-input-search"
                               layadmin-event="serach" lay-action="template/search/keywords=">
                    </li>-->
            </ul>
            <ul class="layui-nav layui-layout-right" lay-filter="layadmin-layout-right">
                <li class="layui-nav-item" lay-unselect>
                    <a lay-href="<?php echo url('index/cache'); ?>" layadmin-event="cache" title="清除缓存">
                        <i class="layui-icon layui-icon-fonts-clear"></i>
                    </a>
                </li>
                <li class="layui-nav-item layui-hide-xs" lay-unselect>
                    <a href="javascript:;" layadmin-event="fullscreen">
                        <i class="layui-icon layui-icon-screen-full"></i>
                    </a>
                </li>
                <li class="layui-nav-item" lay-unselect="">
                    <a href="javascript:;"> <span><img src="/static/admin/img/33.png" alt="" style="width: 40px;height: 40px;"><?php echo session('admin_full_name'); ?></span> <span class="layui-nav-more"></span></a>
                    <dl class="layui-nav-child">
                        <dd><a layadmin-event="info" lay-href="<?php echo url('admin/info'); ?>">基本资料</a></dd>
                        <dd><a layadmin-event="password" lay-href="<?php echo url('admin/password'); ?>">修改密码</a></dd>
                        <dd><a layadmin-event="logout" lay-href="<?php echo url('login/logout'); ?>">退出</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item layui-hide-xs" lay-unselect="">
                    <a href="javascript:;" layadmin-event="theme">
                        <i class="layui-icon layui-icon-theme"></i>
                    </a>
                </li>
            </ul>
        </div>
        <!-- 页面标签 -->
        <div class="layui-body-layout" style="padding:0 10px; background-color: #F2F2F2;">
            <div class="layadmin-tabsbody-item layui-show">
                <iframe src="<?php echo url('index/welcome'); ?>" frameborder="0" class="layadmin-iframe"></iframe>
            </div>
        </div>
    </div>
    <!--用于选色效果-->
    <div id='setbgcolor' style="display:none">
        <div class="layui-layer-shade" id="setbgcolorshade" style="z-index: 19891016; background-color: rgb(0, 0, 0); opacity: 0.3;"></div>
        <div class="layui-layer-color">
            <div class='layui-layer-content'>
                <div class="layui-card-header"> 配色方案</div>
                <div class="layui-card-body layadmin-setTheme">
                    <ul class="layadmin-setTheme-color" id='ChangeColor'>
                        <li layadmin-event="setTheme" data-index="0" data-alias="default" title="default">
                            <div class="layadmin-setTheme-header">
                            </div>
                            <div class="layadmin-setTheme-side" style="background-color: #20222A;">
                                <div class="layadmin-setTheme-logo">
                                </div>
                            </div>
                        </li>
                        <li layadmin-event="setTheme" data-index="1" data-alias="dark-blue" title="dark-blue">
                            <div class="layadmin-setTheme-header">
                            </div>
                            <div class="layadmin-setTheme-side" style="background-color: #03152A;">
                                <div class="layadmin-setTheme-logo">
                                </div>
                            </div>
                        </li>
                        <li layadmin-event="setTheme" data-index="2" data-alias="coffee" title="coffee">
                            <div class="layadmin-setTheme-header">
                            </div>
                            <div class="layadmin-setTheme-side" style="background-color: #2E241B;">
                                <div class="layadmin-setTheme-logo">
                                </div>
                            </div>
                        </li>
                        <li layadmin-event="setTheme" data-index="3" data-alias="purple-red" title="purple-red">
                            <div class="layadmin-setTheme-header">
                            </div>
                            <div class="layadmin-setTheme-side" style="background-color: #50314F;">
                                <div class="layadmin-setTheme-logo">
                                </div>
                            </div>
                        </li>
                        <li layadmin-event="setTheme" data-index="4" data-alias="ocean" title="ocean">
                            <div class="layadmin-setTheme-header">
                            </div>
                            <div class="layadmin-setTheme-side" style="background-color: #344058;">
                                <div class="layadmin-setTheme-logo" style="background-color: #1E9FFF;">
                                </div>
                            </div>
                        </li>
                        <li layadmin-event="setTheme" data-index="5" data-alias="green" title="green">
                            <div class="layadmin-setTheme-header">
                            </div>
                            <div class="layadmin-setTheme-side" style="background-color: #3A3D49;">
                                <div class="layadmin-setTheme-logo" style="background-color: #2F9688;">
                                </div>
                            </div>
                        </li>
                        <li layadmin-event="setTheme" data-index="6" data-alias="red" title="red">
                            <div class="layadmin-setTheme-header">
                            </div>
                            <div class="layadmin-setTheme-side" style="background-color: #20222A;">
                                <div class="layadmin-setTheme-logo" style="background-color: #F78400;">
                                </div>
                            </div>
                        </li>
                        <li layadmin-event="setTheme" data-index="7" data-alias="fashion-red" title="fashion-red">
                            <div class="layadmin-setTheme-header">
                            </div>
                            <div class="layadmin-setTheme-side" style="background-color: #28333E;">
                                <div class="layadmin-setTheme-logo" style="background-color: #AA3130;">
                                </div>
                            </div>
                        </li>
                        <li layadmin-event="setTheme" data-index="8" data-alias="classic-black" title="classic-black">
                            <div class="layadmin-setTheme-header">
                            </div>
                            <div class="layadmin-setTheme-side" style="background-color: #24262F;">
                                <div class="layadmin-setTheme-logo" style="background-color: #3A3D49;">
                                </div>
                            </div>
                        </li>
                        <li layadmin-event="setTheme" data-index="9" data-alias="green-header" title="green-header">
                            <div class="layadmin-setTheme-header" style="background-color: #2F9688;">
                            </div>
                            <div class="layadmin-setTheme-side">
                                <div class="layadmin-setTheme-logo" style="background-color: #226A62;">
                                </div>
                            </div>
                        </li>
                        <li layadmin-event="setTheme" data-index="10" data-alias="ocean-header" title="ocean-header">
                            <div class="layadmin-setTheme-header" style="background-color: #1E9FFF;">
                            </div>
                            <div class="layadmin-setTheme-side" style="background-color: #344058;">
                                <div class="layadmin-setTheme-logo" style="background-color: #0085E8;">
                                </div>
                            </div>
                        </li>
                        <li layadmin-event="setTheme" data-index="11" data-alias="classic-black-header" title="classic-black-header">
                            <div class="layadmin-setTheme-header" style="background-color: #393D49;">
                            </div>
                            <div class="layadmin-setTheme-side">
                                <div class="layadmin-setTheme-logo">
                                </div>
                            </div>
                        </li>
                        <li layadmin-event="setTheme" data-index="12" data-alias="purple-red-header" title="purple-red-header">
                            <div class="layadmin-setTheme-header" style="background-color: #50314F;">
                            </div>
                            <div class="layadmin-setTheme-side" style="background-color: #50314F;">
                                <div class="layadmin-setTheme-logo" style="background-color: #50314F;">
                                </div>
                            </div>
                        </li>
                        <li layadmin-event="setTheme" data-index="13" data-alias="fashion-red-header" title="fashion-red-header">
                            <div class="layadmin-setTheme-header" style="background-color: #AA3130;">
                            </div>
                            <div class="layadmin-setTheme-side" style="background-color: #28333E;">
                                <div class="layadmin-setTheme-logo" style="background-color: #28333E;">
                                </div>
                            </div>
                        </li>
                        <li layadmin-event="setTheme" data-index="14" data-alias="green-header" title="green-header">
                            <div class="layadmin-setTheme-header" style="background-color: #009688;">
                            </div>
                            <div class="layadmin-setTheme-side" style="background-color: #28333E;">
                                <div class="layadmin-setTheme-logo" style="background-color: #009688;">
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--辅助作用一般用于手机遮罩层-->
    <div class="layui-layer-shade mobilenav" id="mobilenav" onClick="clearmobilenav()" style="z-index: 998; background-color: rgb(0, 0, 0); opacity: 0.3;display:none"></div>
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
        }).use(['common', 'index', 'echarts', 'echartsTheme', 'tinymceTextarea', 'layarea', 'iconPicker']);
    </script>
    
</body>

</html>