<?php /*a:2:{s:54:"D:\www\larray\team\basetp6\view\admin\login\index.html";i:1587088962;s:59:"D:\www\larray\team\basetp6\view\admin\..\layouts\admin.html";i:1591586996;}*/ ?>
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
    
<link rel="stylesheet" href="/static/admin/css/login.css" media="all">

</head>
<body>
    
<div class="layui-login layui-display-show " id="LAY-user-login" style="display: none;">
    <div class="layui-login-main">
        <div class="layui-login-box layui-login-header">
            <h2>管理后台登陆</h2>
        </div>
        <!-- <?php echo token_meta(); ?> -->
        <form class="layui-login-box layui-login-body layui-form">
            <div class="layui-form-item">
                <label class="layui-login-icon layui-icon layui-icon-username" for="username"></label>
                <input type="text" name="username" id="username" lay-verify="required" placeholder="用户名" class="layui-input">
            </div>
            <div class="layui-form-item">
                <label class="layui-login-icon layui-icon layui-icon-password" for="password"></label>
                <input type="password" name="password" id="password" lay-verify="required" placeholder="密码" class="layui-input">
            </div>
            <div class="layui-form-item">
                <div class="layui-row">
                    <div class="layui-col-xs7">
                        <label class="layui-login-icon layui-icon layui-icon-vercode" for="vercode"></label>
                        <input type="text" name="vercode" id="vercode" lay-verify="required" placeholder="图形验证码" class="layui-input">
                    </div>
                    <div class="layui-col-xs5">
                        <div style="margin-left: 10px;">
                            <img src="<?php echo url('login/verify'); ?>" class="layui-login-codeimg" id="captcha">
                        </div>
                    </div>
                </div>
            </div>
            <!--            <div class="layui-form-item" style="margin-bottom: 20px;">-->
            <!--                <input type="checkbox" name="remember" lay-skin="primary" title="记住密码">-->
            <!--                <a href="<?php echo url('login/forget'); ?>" class="layui-jump-change layadmin-link"-->
            <!--                   style="margin-top: 7px;">忘记密码？</a>-->
            <!--            </div>-->
            <div class="layui-form-item">
                <button class="layui-btn layui-btn-radius layui-btn-fluid" lay-submit lay-filter="demo">登 陆</button>
            </div>
            <!--<div class="layui-trans layui-form-item layui-login-other">
                <label>帐号注册</label>
                &lt;!&ndash;          <a href="javascript:;"><i class="layui-icon layui-icon-login-qq"></i></a>&ndash;&gt;
                &lt;!&ndash;          <a href="javascript:;"><i class="layui-icon layui-icon-login-wechat"></i></a>&ndash;&gt;
                &lt;!&ndash;          <a href="javascript:;"><i class="layui-icon layui-icon-login-weibo"></i></a>&ndash;&gt;
                &lt;!&ndash;<a href="<?php echo url('login/register'); ?>" class="layui-jump-change layui-link">注册帐号</a>&ndash;&gt;
            </div>-->
        </form>
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
    
<script>
    layui.use(['form', 'element', 'jquery', 'common'], function () {
        var $ = layui.$,
            common = layui.common,
            element = layui.element,
            form = layui.form;
        form.render();

        //提交
        $('#captcha').on('click', function () {
            $(this).attr('src', "<?php echo url('login/verify'); ?>?a=" + Math.random());
        });
        common.submit('demo', "<?php echo url('login/index'); ?>");
    });
    if (top.location != self.location) top.location = self.location;
</script>

    {}{}
</body>
</html>