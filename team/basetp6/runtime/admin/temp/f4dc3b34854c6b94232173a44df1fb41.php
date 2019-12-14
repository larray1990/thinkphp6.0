<?php /*a:1:{s:54:"D:\www\larray\team\basetp6\view\admin\login\index.html";i:1574306478;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>登录|后台管理系统</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="/static/admin/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="/static/admin/css/login.css" media="all">
    <!--[if lt IE 9]>
    <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
    <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="layui-login layui-display-show " id="LAY-user-login" style="display: none;">
    <div class="layui-login-main">
        <div class="layui-login-box layui-login-header">
            <h2>管理后台登陆</h2>
        </div>
        <?php echo token_meta(); ?>
        <div class="layui-login-box layui-login-body layui-form">
            <div class="layui-form-item">
                <label class="layui-login-icon layui-icon layui-icon-username"
                       for="username"></label>
                <input type="text" name="username" id="username" lay-verify="required" placeholder="用户名"
                       class="layui-input">
            </div>
            <div class="layui-form-item">
                <label class="layui-login-icon layui-icon layui-icon-password"
                       for="password"></label>
                <input type="password" name="password" id="password" lay-verify="required"
                       placeholder="密码" class="layui-input">
            </div>
            <div class="layui-form-item">
                <div class="layui-row">
                    <div class="layui-col-xs7">
                        <label class="layui-login-icon layui-icon layui-icon-vercode"
                               for="vercode"></label>
                        <input type="text" name="vercode" id="vercode" lay-verify="required"
                               placeholder="图形验证码" class="layui-input">
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
                <button class="layui-btn layui-btn-radius layui-btn-fluid" lay-submit lay-filter="demo1">登 陆</button>
            </div>
            <div class="layui-trans layui-form-item layui-login-other">
                <label>帐号注册</label>
                <!--          <a href="javascript:;"><i class="layui-icon layui-icon-login-qq"></i></a>-->
                <!--          <a href="javascript:;"><i class="layui-icon layui-icon-login-wechat"></i></a>-->
                <!--          <a href="javascript:;"><i class="layui-icon layui-icon-login-weibo"></i></a>-->
                <a href="<?php echo url('login/register'); ?>" class="layui-jump-change layui-link">注册帐号</a>
            </div>
        </div>
    </div>
</div>
<script src="/static/admin/layui/layui.js"></script>
<script>
    layui.use(['form', 'element', 'jquery'], function () {
        var $ = layui.$
            , setter = layui.setter
            , admin = layui.admin
            , form = layui.form
            , router = layui.router()
            , search = router.search;
        form.render();

        //提交
        $('#captcha').on('click', function () {
            $(this).attr('src', "<?php echo url('login/verify'); ?>?a=" + Math.random());
        });
        //提交
        form.on('submit(demo1)', function (data) {
            layer.msg(JSON.stringify(data.field));
            var index = layer.msg('提交中，请稍候', {icon: 16, time: false, shade: 0.8});
            setTimeout(function () {
                $.ajax({
                    type: "post",
                    url: "<?php echo url('login/index'); ?>",
                    data: data.field,
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    success: function (res) {
                        if (res['code'] == 1) {
                            layer.msg(res['msg']);
                            setTimeout(function () {
                                window.location.href = "<?php echo url('index/index'); ?>";
                            }, 1000);
                        } else {
                            layer.msg(res['msg']);
                        }
                    }
                });
            }, 2000);
            return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
        });

    });
    if (top.location != self.location) top.location = self.location;
</script>
</body>
</html>